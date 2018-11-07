<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class KiTucXa extends Model {
	//
	protected $fillable = [
		'nam_thong_ke',
		'universities_id',
		'tong_dien_tich',
		'nhu_cau',
		'duoc_o',
	];

	public static function findByYear( $university, $year ) {
		return self::where( [
			'universities_id' => $university,
			'nam_thong_ke'    => $year
		] )->first();
	}

	public static function findByManyYear( $universityId, $year ) {
		return self::where( [
			'universities_id' => $universityId,
		] )->whereBetween( 'nam_thong_ke', [ ( $year - 4 ), $year ] )->orderBy( 'nam_thong_ke', 'desc' )->get();
	}
}
