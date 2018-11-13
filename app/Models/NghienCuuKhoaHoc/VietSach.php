<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class VietSach extends Model {
	protected $fillable = [
		'nam_thong_ke',
		'universities_id',
		'sach_chuyen_khao',
		'sach_giao_trinh',
		'sach_tham_khao',
		'sach_huong_dan',
		'sl_theo_can_bo',
	];

	//
	public static function getSoLuongSachByYear( $universityId, $year ) {
		return self::where( [
			'nam_thong_ke'    => $year,
			'universities_id' => $universityId
		] )->first();
	}
}
