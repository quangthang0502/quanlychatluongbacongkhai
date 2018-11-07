<?php

namespace App\Http\Controllers\University;

use App\Models\CoSoVatChat;
use App\Models\TaiChinh;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Infrastructure extends Controller {
	//
	public function index( $slug, $year ) {
		$title      = 'Thống kê cơ sở vật chất và tài chính';
		$university = University::findBySlug( $slug );

		$taiChinh    = TaiChinh::getTaiChinhByYear( $university->id, $year );
		$coSoVatChat = CoSoVatChat::getCoSoVatChatByYear( $university->id, $year );

		if ( is_null( $taiChinh ) ) {
			TaiChinh::create( [
				'nam_thong_ke'    => $year,
				'universities_id' => $university->id
			] );
		}

		if ( is_null( $coSoVatChat ) ) {
			CoSoVatChat::create( [
				'nam_thong_ke'    => $year,
				'universities_id' => $university->id
			] );
			$coSoVatChat = TaiChinh::getTaiChinhByYear( $university->id, $year );
		}

		$taiChinh = TaiChinh::getTaiChinhByManyYear( $university->id, $year );

		return view( 'Infrastructure.' . __FUNCTION__, compact( 'title', 'slug', 'year', 'coSoVatChat', 'taiChinh' ) );
	}

	public function create( $slug, $year ) {
		$title      = 'Chỉnh sửa thông tin cơ sở vật chất và tài chính';
		$university = University::findBySlug( $slug );

		$taiChinh    = TaiChinh::getTaiChinhByYear( $university->id, $year );
		$coSoVatChat = CoSoVatChat::getCoSoVatChatByYear( $university->id, $year );

		return view( 'Infrastructure.' . __FUNCTION__, compact( 'title', 'slug', 'year', 'coSoVatChat', 'taiChinh' ) );
	}

	public function postCreate( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );

		$taiChinh    = TaiChinh::getTaiChinhByYear( $university->id, $year );
		$coSoVatChat = CoSoVatChat::getCoSoVatChatByYear( $university->id, $year );

		$request     = $this->validate( $request, [
			'tong_dien_tich'          => 'numeric',
			'noi_lam_viec'            => '',
			'noi_hoc'                 => '',
			'noi_vui_choi'            => '',
			'dien_tich_phong_hoc'     => '',
			'ty_so_dien_tich_tren_sv' => '',
			'so_sach_tv'              => 'numeric',
			'sach_dao_tao'            => 'numeric',
			'so_may_tinh_vp'          => 'numeric',
			'so_may_tinh_sv'          => 'numeric',
			'ty_so_mt_tren_sv'        => '',
			'tong_kinh_phi'           => '',
			'tong_thu_hoc_phi'        => '',
		] );

		$dataCoSoVatChat = [
			'tong_dien_tich'          => $request['tong_dien_tich'],
			'noi_lam_viec'            => $request['noi_lam_viec'],
			'noi_hoc'                 => $request['noi_hoc'],
			'noi_vui_choi'            => $request['noi_vui_choi'],
			'dien_tich_phong_hoc'     => $request['dien_tich_phong_hoc'],
			'ty_so_dien_tich_tren_sv' => $request['ty_so_dien_tich_tren_sv'],
			'so_sach_tv'              => $request['so_sach_tv'],
			'sach_dao_tao'            => $request['sach_dao_tao'],
			'so_may_tinh_vp'          => $request['so_may_tinh_vp'],
			'so_may_tinh_sv'          => $request['so_may_tinh_sv'],
			'ty_so_mt_tren_sv'        => $request['ty_so_mt_tren_sv'],
		];

		$coSoVatChat->update($dataCoSoVatChat);
		$taiChinh->update([
			'tong_kinh_phi'           => $request['tong_kinh_phi'],
			'tong_thu_hoc_phi'        => $request['tong_thu_hoc_phi'],
		]);

		return back()->with('success', 'Cập nhật thành công');
	}
}
