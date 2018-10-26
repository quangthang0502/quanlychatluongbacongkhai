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
		$title = 'Giới thiệu khái quát về nhà trường ' . $university->vi_ten;

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title', 'slug', 'gioiThieu' ) );
	}

	public function create( $slug ) {
		$title = 'Thêm giới thiệu về trường';

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'title', 'slug' ) );
	}

	public function postCreate( $slug, Request $request ) {
		$content    = $request->only( 'noi_dung' );
		$university = University::findBySlug( $slug );

		$gioiThieu = $this->_gioiThieu->create( $content );


		$university->gioi_thieu_id = $gioiThieu->id;
		$university->save();

		return redirect()->route( 'university.intro.index', $slug )->with( 'success', 'Thêm thông tin trường thành công' );
	}

	public function edit( $slug, GioiThieu $gioiThieu ) {
		$title = 'Chỉnh sửa thông tin chi tiết';

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'slug', 'gioiThieu', 'title' ) );
	}

	public function postEdit($slug, GioiThieu $gioiThieu, Request $request){
		$content    = $request->only( 'noi_dung' );

		$gioiThieu->update($content);

		return back()->with( 'success', 'Chỉnh sửa thông tin trường thành công' );
	}
}
