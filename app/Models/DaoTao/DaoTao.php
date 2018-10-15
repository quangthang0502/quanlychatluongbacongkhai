<?php

namespace App\Models\DaoTao;

use Illuminate\Database\Eloquent\Model;

class DaoTao extends Model {
	protected $fillable = [
		'id',
		'universities_id',
		'tong_so_cac_khoa',
		'thong_ke_nam',
	];

	public function findByYear( $university, $year ) {
		return DaoTao::where( [
			'universities_id' => $university,
			'thong_ke_nam'    => $year,
		] )->first();
	}

	public function chuyenNganhDaoTao() {
		return ChuyenNganhDaoTao::where( 'dao_tao_id', $this->id )->first();
	}

	public function loaiHinhDaoTao() {
		return LoaiHinhDaoTao::where( 'dao_tao_id', $this->id )->first();
	}
}
