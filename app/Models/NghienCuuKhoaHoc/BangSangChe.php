<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class BangSangChe extends Model {
	//
	protected $fillable = [
		'noi_dung',
		'nam_thong_ke',
		'universities_id',
	];

	public static function getBangSangCheByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
