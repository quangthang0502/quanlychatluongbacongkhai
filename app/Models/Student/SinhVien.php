<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'thong_ke_nam',
		'sl_du_thi',
		'sl_trung_tuyen',
		'sl_nhap_hoc',
		'sl_sv_quoc_te',
		'trinh_do',
		'diem_dau_vao',
		'diem_tb',
	];

	public static function findByYear( $university, $year, $trinhDo ) {
		return self::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year,
			'trinh_do' => $trinhDo
		] )->first();
	}

	public static function findByManyYear( $university, $year ) {
		return self::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year,
		] )->first();
	}
}
