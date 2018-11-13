<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class NckhNghiemThu extends Model {
	//
	protected $fillable = [
		'cap_nn',
		'cap_bo',
		'cap_truong',
		'doanh_thu',
		'ti_so_doanh_thu',
		'ti_le_doanh_thu',
		'nam_thong_ke',
		'sl_theo_can_bo',
		'universities_id'
	];

	public static function getSoLuongNckhByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
