<?php

namespace App\Http\Controllers\Leaders;

use App\Models\CanBo\CanBoChuChot;
use App\Http\Controllers\Controller;

class UniversityLeaders extends Controller {
	protected $_canBo;
	const VIEW_PATH = 'leaders.';

	public function __construct( CanBoChuChot $canBo ) {
		$this->_canBo = $canBo;
	}

	public function index( $slug ) {
		$title = 'Danh sách cán bộ chủ chốt';

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'slug', 'title' ) );
	}
}
