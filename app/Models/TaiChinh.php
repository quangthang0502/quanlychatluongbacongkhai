<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiChinh extends Model {
	//
	protected $fillable = [
		'universities_id',
		'nam_thong_ke',
		'tong_kinh_phi',
		'tong_thu_hoc_phi',
	];

	public static function getTaiChinhByManyYear( $universityId, $year ) {

		return self::where( [
			'universities_id' => $universityId,
		] )->whereBetween( 'nam_thong_ke', [ ( $year - 4 ), $year ] )->orderBy( 'nam_thong_ke', 'desc' )->get();
	}

	public static function getTaiChinhByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
