<?php

namespace App\Models\Canbo;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model {
	//
	protected $fillable = [
		'universities_id',
		'thong_ke_nam',
		'trinh_do',
		'so_luong',
		'giao_vien_nam',
		'gv_bien_che',
		'gv_hop_dong',
		'gv_quan_ly',
		'gv_thinh_giang',
		'gv_quoc_te',
		'do_tuoi',
	];

	public static function findByYear( $universities_id, $thong_ke_nam ) {
		return self::where( [
			'universities_id' => $universities_id,
			'thong_ke_nam'    => $thong_ke_nam,
		] )->orderBy('trinh_do', 'asc')->get();
	}
}
