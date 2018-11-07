<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoSoVatChat extends Model {
	protected $fillable = [
		'universities_id',
		'nam_thong_ke',
		'tong_dien_tich',
		'noi_lam_viec',
		'noi_hoc',
		'noi_vui_choi',
		'dien_tich_phong_hoc',
		'ty_so_dien_tich_tren_sv',
		'so_sach_tv',
		'sach_dao_tao',
		'so_may_tinh_vp',
		'so_may_tinh_sv',
		'ty_so_mt_tren_sv',
	];

	//
	public static function getCoSoVatChatByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
