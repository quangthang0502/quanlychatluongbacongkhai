<?php

namespace App\Http\Controllers\University;

use App\Models\Canbo\GiangVien;
use App\Models\Canbo\PhanLoaiCanBo;
use App\Models\CanBo\TrinhDoNNTH;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Teacher extends Controller {
	const VIEW_PATH = 'teacher.';

	//
	public function index( $slug, $year ) {
		$title = 'Tổng hợp nhân viên';

		$university = University::findBySlug( $slug );

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );
		$giangVien     = GiangVien::findByYear( $university->id, $year );
		$trinhDo       = TrinhDoNNTH::findByYear( $university->id, $year );

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'phanLoaiCanBo', 'giangVien', 'trinhDo' ) );
	}

	public function create( $slug, $year ) {
		$title      = 'Nhập thông tin năm ' . $year;
		$university = University::findBySlug( $slug );

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );
		$giangVien     = GiangVien::findByYear( $university->id, $year );
		$trinhDo       = TrinhDoNNTH::findByYear( $university->id, $year );

		if ( $phanLoaiCanBo == null ) {
			$phanLoaiCanBo = PhanLoaiCanBo::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
			] )->refresh();
		}
		if ( count( $giangVien ) == 0 ) {
			for ( $i = 1; $i < 10; $i ++ ) {
				$jsonArr = [
					'lv_1' => 0,
					'lv_2' => 0,
					'lv_3' => 0,
					'lv_4' => 0,
					'lv_5' => 0,
				];
				GiangVien::create( [
					'universities_id' => $university->id,
					'thong_ke_nam'    => $year,
					'trinh_do'        => $i,
					'do_tuoi'         => json_encode( $jsonArr ),
				] );
			}
			$giangVien = GiangVien::findByYear( $university->id, $year );
		}

		if ( $trinhDo == null ) {
			$jsonArr = [
				'lv_1' => 0,
				'lv_2' => 0,
				'lv_3' => 0,
				'lv_4' => 0,
				'lv_5' => 0,
			];
			TrinhDoNNTH::create( [
				'universities_id'    => $university->id,
				'thong_ke_nam'       => $year,
				'trinh_do_ngoai_ngu' => json_encode( $jsonArr ),
				'tin_hoc'            => json_encode( $jsonArr ),
			] );
		}

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'giangVien', 'phanLoaiCanBo', 'trinhDo' ) );
	}

	public function postCreate( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );

		$request = $this->validate( $request, [
			'bien_che_nam' => 'numeric',
			'bien_che_nu'  => 'numeric',
			'hop_dong_nam' => 'numeric',
			'hop_dong_nu'  => 'numeric',
			'cb_khac_nam'  => 'numeric',
			'cb_khac_nu'   => 'numeric',
		] );

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );

		$phanLoaiCanBo->update( $request );

		return back()->with( 'success', 'Chỉnh sửa thành công' );
	}

	public function updateTeacher( $slug, $year, Request $request ) {

		$request = $this->validate( $request, [
			'id'            => 'numeric',
			'trinh_do'      => 'numeric',
			'so_luong'      => 'numeric',
			'giao_vien_nam' => 'numeric',
			'gv_bien_che'   => 'numeric',
			'gv_hop_dong'   => 'numeric',
			'gv_quan_ly'    => 'numeric',
			'do_tuoi'       => '',
		] );

		$giangVien = GiangVien::find( $request['id'] );
		unset( $request['id'] );
		$giangVien->update( $request );

		echo response()->json( $giangVien, 200 );
	}

	public function updateLevel( $slug, $year, Request $request ) {

		$request = $this->validate( $request, [
			'id'                 => 'numeric',
			'trinh_do_ngoai_ngu' => '',
			'tin_hoc'            => '',
		] );

		$trinhDo = TrinhDoNNTH::find( $request['id'] );
		unset( $request['id'] );
		$trinhDo->update( $request );

		echo response()->json( $trinhDo, 200 );
	}
}
