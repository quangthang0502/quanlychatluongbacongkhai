<?php

namespace App\Http\Controllers\University;

use App\Models\Canbo\GiangVien;
use App\Models\Canbo\PhanLoaiCanBo;
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

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'phanLoaiCanBo' ) );
	}

	public function create( $slug, $year ) {
		$title      = 'Nhập thông tin năm ' . $year;
		$university = University::findBySlug( $slug );

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );
		$giangVien     = GiangVien::findByYear( $university->id, $year );

		if ( $phanLoaiCanBo == null ) {
			$phanLoaiCanBo = PhanLoaiCanBo::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
			] )->refresh();
		}

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'giangVien', 'phanLoaiCanBo' ) );
	}

	public function postCreate($slug, $year, Request $request){
		$university = University::findBySlug( $slug );

		$request = $this->validate($request,[
			'bien_che_nam' => 'numeric',
			'bien_che_nu' => 'numeric',
			'hop_dong_nam' => 'numeric',
			'hop_dong_nu' => 'numeric',
			'cb_khac_nam' => 'numeric',
			'cb_khac_nu' => 'numeric',
		]);

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );

		$phanLoaiCanBo->update($request);

		return back()->with('success', 'Chỉnh sửa thành công');
	}
}
