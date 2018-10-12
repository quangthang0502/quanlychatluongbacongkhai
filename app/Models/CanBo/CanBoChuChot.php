<?php

namespace App\Models\CanBo;

use Illuminate\Database\Eloquent\Model;

class CanBoChuChot extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'bo_phan_id',
		'hoc_vi',
		'chuc_vu',
		'ho_va_ten',
		'nam_sinh',
		'thong_ke_nam',
	];

	public function boPhan() {
		return BoPhan::find( $this->universities_id );
	}

	public static function findByUniversityAndYear( $universityId, $year ) {
		return self::where( [
			'universities_id' => $universityId,
			'thong_ke_nam'    => $year
		] )->get();
	}
}
