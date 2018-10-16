<?php

namespace App\Models\DaoTao;

use Illuminate\Database\Eloquent\Model;

class LoaiHinhDaoTao extends Model {
	protected $fillable = [
		'id',
		'dao_tao_id',
		'chinh_quy',
		'khong_chinh_quy',
		'tu_xa',
		'lien_ket_nuoc_ngoai',
		'lien_ket_trong_nuoc',
		'khac',
	];
}
