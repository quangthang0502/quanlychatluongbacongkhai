<?php

namespace App\Http\Controllers\University;

use App\Models\DaoTao\ChuyenNganhDaoTao;
use App\Models\DaoTao\DaoTao;
use App\Models\DaoTao\LoaiHinhDaoTao;
use App\Models\University;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Training extends Controller {
	const VIEW_PATH = 'training.';

	public function index( $slug, $year ) {
		$title = 'Thông tin đào tạo năm ' . $year;

		$university = University::findBySlug( $slug );

		/** @var DaoTao $daoTao */
		$daoTao = DaoTao::findByYear( $university->id, $year );

		if ( $daoTao == null ) {
			$daoTao = DaoTao::create( [
				'universities_id'  => $university->id,
				'tong_so_cac_khoa' => 0,
				'thong_ke_nam'     => $year,
			] );

			$chuyenNganhDaoTao = ChuyenNganhDaoTao::create( [
				'dao_tao_id' => $daoTao->id
			] );

			$loaiHinhDaoTao = LoaiHinhDaoTao::create( [
				'dao_tao_id' => $daoTao->id
			] );
		} else {
			$chuyenNganhDaoTao = $daoTao->chuyenNganhDaoTao();
			$loaiHinhDaoTao    = $daoTao->loaiHinhDaoTao();
		}

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'title', 'slug', 'year', 'chuyenNganhDaoTao', 'loaiHinhDaoTao', 'daoTao' ) );
	}

	public function postCreate( $slug, DaoTao $daoTao, Request $request ) {
		$title = 'Thông tin đào tạo năm ' . $daoTao->thong_ke_nam;

		$request = $this->validate($request,[
			'chinh_quy' => 'numeric',
			'khong_chinh_quy' => 'numeric',
			'tu_xa' => 'numeric',
			'lien_ket_nuoc_ngoai' => 'numeric',
			'lien_ket_trong_nuoc' => 'numeric',
			'khac' => '',
			'dao_tao_tien_sy' => 'numeric',
			'dao_tao_thac_sy' => 'numeric',
			'dao_tao_dai_hoc' => 'numeric',
			'dao_tao_cao_dang' => 'numeric',
			'dao_tao_tccn' => 'numeric',
			'dao_tao_nghe' => 'numeric',
			'dao_tao_khac' => 'numeric',
			'tong_so_cac_khoa' => '',
		]);

		$data = $request->only( [
			'chinh_quy',
			'khong_chinh_quy',
			'tu_xa',
			'lien_ket_nuoc_ngoai',
			'lien_ket_trong_nuoc',
			'khac',
			'dao_tao_tien_sy',
			'dao_tao_thac_sy',
			'dao_tao_dai_hoc',
			'dao_tao_cao_dang',
			'dao_tao_tccn',
			'dao_tao_nghe',
			'dao_tao_khac',
			'tong_so_cac_khoa',
		] );

		/** @var ChuyenNganhDaoTao $chuyenNganhDaoTao */
		$chuyenNganhDaoTao = $daoTao->chuyenNganhDaoTao();

		/** @var LoaiHinhDaoTao $loaiHinhDaoTao */
		$loaiHinhDaoTao = $daoTao->loaiHinhDaoTao();

		$daoTao->update([
			'tong_so_cac_khoa' => $data['tong_so_cac_khoa']
		]);

		$chuyenNganhDaoTao->update([
			'dao_tao_tien_sy' => $data['dao_tao_tien_sy'],
			'dao_tao_thac_sy' => $data['dao_tao_thac_sy'],
			'dao_tao_dai_hoc' => $data['dao_tao_dai_hoc'],
			'dao_tao_cao_dang' => $data['dao_tao_cao_dang'],
			'dao_tao_tccn' => $data['dao_tao_tccn'],
			'dao_tao_nghe' => $data['dao_tao_nghe'],
			'dao_tao_khac' => $data['dao_tao_khac'],
		]);

		$loaiHinhDaoTao->update([
			'chinh_quy' => $data['chinh_quy'],
			'khong_chinh_quy' => $data['khong_chinh_quy'],
			'tu_xa' => $data['tu_xa'],
			'lien_ket_nuoc_ngoai' => $data['lien_ket_nuoc_ngoai'],
			'lien_ket_trong_nuoc' => $data['lien_ket_trong_nuoc'],
			'khac' => $data['khac'],
		]);

		return response()->json('xong', 200);
	}
}
