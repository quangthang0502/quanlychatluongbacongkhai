<?php

namespace App\Http\Controllers\Leaders;

use App\Models\CanBo\BoPhan;
use App\Models\CanBo\CanBoChuChot;
use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;


class UniversityLeaders extends Controller {
	protected $_canBo;
	const VIEW_PATH = 'leaders.';

	public function __construct( CanBoChuChot $canBo ) {
		$this->_canBo = $canBo;
	}

	public function index( $slug, $year ) {
		$title = 'Danh sách cán bộ chủ chốt';

		$university = University::findBySlug( $slug );

		$canBo = $this->_canBo->findByUniversityAndYear( $university->id, $year );

		$data = [];

		foreach ( $canBo as $item ) {
			/** @var CanBoChuChot $item */
			$boPhan = $item->boPhan();
			$data[] = [
				'hoc_vi'       => $item->hoc_vi,
				'chuc_vu'      => $item->chuc_vu,
				'ho_va_ten'    => $item->ho_va_ten,
				'nam_sinh'     => $item->nam_sinh,
				'bo_phan'      => $boPhan->name,
				'nhom_bo_phan' => $boPhan->group
			];
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'slug', 'title', 'data', 'year' ) );
	}

	public function create( $slug, $year ) {
		$title      = 'Thêm danh sách cán bộ';
		$university = University::findBySlug( $slug );

		$canBo = $this->_canBo->findByUniversityAndYear( $university->id, $year );

		$data = [];

		foreach ( $canBo as $item ) {
			/** @var CanBoChuChot $item */
			$boPhan = $item->boPhan();
			$data[] = [
				'id'           => $item->id,
				'hoc_vi'       => $item->hoc_vi,
				'chuc_vu'      => $item->chuc_vu,
				'ho_va_ten'    => $item->ho_va_ten,
				'nam_sinh'     => $item->nam_sinh,
				'bo_phan'      => $boPhan->name,
				'nhom_bo_phan' => $boPhan->group
			];
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( self::VIEW_PATH . __FUNCTION__, compact( 'slug', 'title', 'data', 'year' ) );
	}

	public function postCreate( $slug, Request $request ) {
		$this->validate( $request, [
			'bo_phan_id'   => 'required',
			'hoc_vi'       => 'required',
			'chuc_vu'      => 'required',
			'ho_va_ten'    => 'required',
			'nam_sinh'     => 'required',
			'thong_ke_nam' => 'required',
		] );

		$data = $request->only( [
			'bo_phan_id',
			'hoc_vi',
			'chuc_vu',
			'ho_va_ten',
			'nam_sinh',
			'thong_ke_nam',
		] );

		$university = University::findBySlug( $slug );

		$data['universities_id'] = $university->id;
		$data['nam_sinh']        = (string) $data['nam_sinh'];

		$canBo = $this->_canBo->create( $data );

		$boPhan = BoPhan::find( $canBo->bo_phan_id );

		$result = [
			'hoc_vi'       => $canBo->hoc_vi,
			'chuc_vu'      => $canBo->chuc_vu,
			'ho_va_ten'    => $canBo->ho_va_ten,
			'nam_sinh'     => $canBo->nam_sinh,
			'bo_phan'      => $boPhan->name,
			'nhom_bo_phan' => $boPhan->group
		];

		return response()->json( $result, 200 );
	}

	public function delete( $slug, $id ) {
		$this->_canBo->destroy( $id );

		return back()->with( 'success', 'Xóa thành công!' );
	}
}
