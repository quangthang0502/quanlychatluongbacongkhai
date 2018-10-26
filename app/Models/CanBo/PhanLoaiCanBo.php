<?php

namespace App\Models\Canbo;

use Illuminate\Database\Eloquent\Model;

class PhanLoaiCanBo extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'thong_ke_nam',
		'bien_che_nam',
		'bien_che_nu',
		'hop_dong_nam',
		'hop_dong_nu',
		'cb_khac_nam',
		'cb_khac_nu',
	];

	public static function findByYear( $universities_id, $thong_ke_nam ) {
		return self::where( [
			'universities_id' => $universities_id,
			'thong_ke_nam'    => $thong_ke_nam,
		] )->first();
	}
}
