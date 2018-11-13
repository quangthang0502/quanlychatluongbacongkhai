<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class TapChi extends Model {
	//
	protected $fillable = [
		'quoc_te',
		'trong_nuoc',
		'cap_truong',
		'nam_thong_ke',
		'sl_theo_can_bo',
		'universities_id',
	];

	public static function getSoLuongTapChiByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
