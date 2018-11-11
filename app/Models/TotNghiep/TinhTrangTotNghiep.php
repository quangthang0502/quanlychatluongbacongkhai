<?php

namespace App\Models\TotNghiep;

use Illuminate\Database\Eloquent\Model;

class TinhTrangTotNghiep extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'type',
		'thong_ke_nam',
		'so_luong_sv_tot_nghiep',
		'ty_le_tot_nghiep',
		'cau_3_1',
		'cau_3_2',
		'cau_3_3',
		'cau_4_1',
		'cau_4_2',
		'cau_4_3',
		'cau_5_1',
		'cau_5_2',
		'cau_5_3',
	];

	public static function findByYear( $university, $year ) {
		return self::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year
		] )->first();
	}

	public static function findByYearAndType( $university, $year, $type ) {
		return self::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year,
			'type'            => $type,
		] )->first();
	}
}
