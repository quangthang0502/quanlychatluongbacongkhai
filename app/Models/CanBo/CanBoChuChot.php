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
		'nam_sinhh',
		'thong_ke_nam',
	];
}
