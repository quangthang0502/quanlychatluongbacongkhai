<?php

namespace App\Http\Controllers\University;

use App\Models\University;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UniversityController extends Controller {
	//
	public function edit( $slug ) {
		$university = University::findBySlug( $slug );
		$title      = 'Chỉnh sửa thông tin cơ bản của trường ' . $university->vi_ten;

		return view( 'dashboard.' . __FUNCTION__, compact( 'slug', 'title', 'university' ) );
	}

	public function postEdit($slug, Request $request){
		$result = $request->only([
			'vi_ten',
			'en_ten',
			'vi_viet_tat',
			'en_viet_tat',
			'ten_cu',
			'co_quan',
			'dia_chi',
			'dien_thoai',
			'fax',
			'website',
			'nam_thanh_lap',
			'thoi_gian_bat_dau_dao_tao',
			'thoi_gian_cap_bang_khoa_dau',
			'loai_hinh_dao_tao',
		]);

		$university = University::findBySlug($slug);
		$university->update($result);

		return redirect()->route('dashboard.university', $slug)->with('success', 'Cập nhập thông tin thành công');
	}
}
