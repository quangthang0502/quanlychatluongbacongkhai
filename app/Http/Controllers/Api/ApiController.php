<?php

namespace App\Http\Controllers\Api;

use App\Models\CanBo\BoPhan;
use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class ApiController extends Controller {
	//
	public function getBoPhan( Request $request ) {
		if ( isset( $request['term'] ) ) {
			$boPhan = BoPhan::where( 'name', 'like', '%' . $request['term'] . '%' )->get();
		} else {
			$boPhan = BoPhan::all();
		}

		return response()->json( $boPhan, 200 );
	}

	public function postBoPhan( Request $request ) {
		$this->validate( $request, [
			'name'  => 'required|unique:bo_phans',
			'group' => 'required'
		] );
		$data = $request->only( [
			'name',
			'group'
		] );

		BoPhan::create( $data );

		return response()->json( 'Tạo mới thành công', 200 );

	}

	public function getUniversities(Request $request){
		if ( isset( $request['term'] ) ) {
			$boPhan = University::where( 'vi_ten', 'like', '%' . $request['term'] . '%' )->get();
		} else {
			$boPhan = University::all();
		}

		return response()->json( $boPhan, 200 );
	}

	public function createUniversity(Request $request){
		$result = $request->only([
			'vi_ten',
			'type'
		]);

		$result['slug'] = str_slug($result['vi_ten']);

		University::create($result);

		return response()->json( 'Tạo mới thành công', 200 );
	}
}
