<?php

namespace App\Http\Controllers\Api;

use App\Models\CanBo\BoPhan;
use App\Http\Controllers\Controller;

class ApiController extends Controller {
	//
	public function getBoPhan() {
		$boPhan = BoPhan::all();

		return response()->json( $boPhan, 200 );
	}
}
