<?php

namespace App\Models\CanBo;

use Illuminate\Database\Eloquent\Model;

class TrinhDoNNTH extends Model {
	//
	protected $fillable = [
		'id',
		'universities_id',
		'thong_ke_nam',
		'trinh_do_ngoai_ngu',
		'tin_hoc',
	];

	public static function findByYear( $universities_id, $thong_ke_nam ) {
		return self::where( [
			'universities_id' => $universities_id,
			'thong_ke_nam'    => $thong_ke_nam,
		] )->first();
	}
}
