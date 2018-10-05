<?php

namespace App\Http\Controllers\University;

use App\Models\GioiThieu;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller {
	protected $_gioiThieu;
	const VIEW_PATH = 'intro.';

	//
	public function __construct( GioiThieu $gioiThieu ) {
		$this->_gioiThieu = $gioiThieu;
	}

	public function index( $slug ) {
		$university = University::findBySlug( $slug );

		$gioiThieu = $this->_gioiThieu->find( $university->gioi_thieu_id );
		if ( is_null( $gioiThieu ) ) {
			return redirect()->route( 'university.intro.create', $slug );
		}
		echo json_encode( $gioiThieu );
		die;
	}

	public function create( $slug ) {
		$university = University::findBySlug( $slug );
		$title      = 'Thêm giới thiệu về trường';

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title' , 'slug') );
	}
}
