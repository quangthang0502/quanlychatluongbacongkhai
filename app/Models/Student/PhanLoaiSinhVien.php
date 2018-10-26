<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class PhanLoaiSinhVien extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'thong_ke_nam',
		'nghien_cuu_sinh',
		'hoc_vien_cao_hoc',
		'dh_he_chinh_quy',
		'dh_he_khong_chinh_quy',
		'cd_he_chinh_quy',
		'cd_he_khong_chinh_quy',
		'tccn_he_chinh_quy',
		'tccn_he_khong_chinh_quy',
		'khac',
	];

	public static function findByYear( $university, $year ) {
		return self::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year
		] )->first();
	}

	public static function findByManyYear( $university, $year ) {
		return self::where( [
			'universities_id' => $university,
		] )->whereBetween( 'thong_ke_nam', [ ( $year - 4 ), $year ] )->orderBy('thong_ke_nam', 'desc')->get();
	}
}
