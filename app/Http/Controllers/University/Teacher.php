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

		$university     = University::findBySlug( $slug );
		$universityType = $university->type;
		$phanLoaiCanBo  = PhanLoaiCanBo::findByYear( $university->id, $year );
		$giangVien      = GiangVien::findByYear( $university->id, $year );
		$trinhDo        = TrinhDoNNTH::findByYear( $university->id, $year );

		$thongKeBang18 = [
			'so_luong'       => 0,
			'gv_bien_che'    => 0,
			'gv_hop_dong'    => 0,
			'gv_quan_ly'     => 0,
			'gv_thinh_giang' => 0,
			'gv_quoc_te'     => 0,
		];
		$gvQuyDoi      = [];
		$tongQuyDoi    = 0;
		$thongKeDoTuoi = [
			'giao_vien_nam' => 0,
			'giao_vien_nu'  => 0,
			'lv_1'          => 0,
			'lv_2'          => 0,
			'lv_3'          => 0,
			'lv_4'          => 0,
			'lv_5'          => 0,
		];
		foreach ( $giangVien as $item ) {
			$thongKeBang18['so_luong']       += $item->so_luong;
			$thongKeBang18['gv_bien_che']    += $item->gv_bien_che;
			$thongKeBang18['gv_hop_dong']    += $item->gv_hop_dong;
			$thongKeBang18['gv_quan_ly']     += $item->gv_quan_ly;
			$thongKeBang18['gv_thinh_giang'] += $item->gv_thinh_giang;
			$thongKeBang18['gv_quoc_te']     += $item->gv_quoc_te;

			$gvQuyDoi[ $item->trinh_do ] = heSoQuyDoi( $item->trinh_do, $universityType )
			                               * ( $item->gv_bien_che + $item->gv_hop_dong
			                                   + $item->gv_quan_ly * 0.3
			                                   + $item->gv_thinh_giang * 0.2
			                                   + $item->gv_quoc_te * 0.2 );

			$tongQuyDoi += $gvQuyDoi[ $item->trinh_do ];

			$doTuoi = json_decode( $item->do_tuoi );

			$thongKeDoTuoi['giao_vien_nam'] += $item->giao_vien_nam;
			$thongKeDoTuoi['giao_vien_nu']  += ( $item->so_luong - $item->giao_vien_nam );
			$thongKeDoTuoi['lv_1']          += $doTuoi->lv_1;
			$thongKeDoTuoi['lv_2']          += $doTuoi->lv_2;
			$thongKeDoTuoi['lv_3']          += $doTuoi->lv_3;
			$thongKeDoTuoi['lv_4']          += $doTuoi->lv_4;
			$thongKeDoTuoi['lv_5']          += $doTuoi->lv_5;
		}
		$thongKeBang18 = json_decode( json_encode( $thongKeBang18, true ) );

		$tiLeGiangVienCoHuu = 0;
		if ( $phanLoaiCanBo != null ) {
			$tiLeGiangVienCoHuu = ( $thongKeBang18->so_luong - $thongKeBang18->gv_thinh_giang )
			                      * 100 / ( $phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu
			                                + $phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
			                                $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu );
		}


		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'phanLoaiCanBo', 'giangVien',
				'trinhDo', 'thongKeBang18', 'tiLeGiangVienCoHuu', 'universityType', 'gvQuyDoi', 'tongQuyDoi', 'thongKeDoTuoi' ) );
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
			$id      = TrinhDoNNTH::create( [
				'universities_id'    => $university->id,
				'thong_ke_nam'       => $year,
				'trinh_do_ngoai_ngu' => json_encode( $jsonArr ),
				'tin_hoc'            => json_encode( $jsonArr ),
			] )->id;

			$trinhDo = TrinhDoNNTH::find( $id );
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
			'id'             => 'numeric',
			'trinh_do'       => 'numeric',
			'so_luong'       => 'numeric',
			'giao_vien_nam'  => 'numeric',
			'gv_bien_che'    => 'numeric',
			'gv_hop_dong'    => 'numeric',
			'gv_quan_ly'     => 'numeric',
			'gv_thinh_giang' => 'numeric',
			'gv_quoc_te'     => 'numeric',
			'do_tuoi'        => '',
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
