<?php

namespace App\Models\DaoTao;

use Illuminate\Database\Eloquent\Model;

class ChuyenNganhDaoTao extends Model {
	protected $fillable = [
		'id',
		'dao_tao_id',
		'dao_tao_tien_sy',
		'dao_tao_thac_sy',
		'dao_tao_dai_hoc',
		'dao_tao_cao_dang',
		'dao_tao_tccn',
		'dao_tao_nghe',
		'dao_tao_khac',
	];
}
