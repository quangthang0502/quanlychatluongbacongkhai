<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
	protected $fillable = [
		'id',
		'vi_ten',
		'en_ten',
		'vi_viet_tat',
		'en_viet_tat',
		'ten_cu',
		'co_quan',
		'dia_chi',
		'dien_thoai',
		'fax',
		'website',
		'nam_thanh_lap',
		'thoi_gian_bat_dau_dao_tao',
		'thoi_gian_cap_bang_khoa_dau',
		'gioi_thieu_id',
		'slug'
	];
}
