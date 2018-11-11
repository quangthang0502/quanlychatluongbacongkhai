<?php

namespace App\Http\Controllers\University;

use App\Models\TotNghiep\TinhTrangTotNghiep;
use App\Models\TotNghiep\TotNghiep;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinhVienTotNghiep extends Controller {
	//
	const VIEW_PATH = 'hocvientotnghiep.';

	public function index( $slug, $year ) {
		$title = 'Quản lý sinh viên tốt nhiệp';

		$university = University::findBySlug( $slug );

		$totNghiep = TotNghiep::findByYear( $university->id, $year );
		if ( is_null( $totNghiep ) ) {
			TotNghiep::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year
			] );
		}

		$totNghiep = TotNghiep::findByManyYear( $university->id, $year );

		$tinhTrangTotNghiep = TinhTrangTotNghiep::findByYear( $university->id, $year );
		if ( is_null( $tinhTrangTotNghiep ) ) {
			TinhTrangTotNghiep::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
				'type'            => 'chinh_quy'
			] );
			TinhTrangTotNghiep::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
				'type'            => 'cao_dang'
			] );
		}
		$sinhVienChinhQuy = $this->layDuLieuTotNghiep( $university->id, $year, 'chinh_quy' );
		$sinhVienCaoDang  = $this->layDuLieuTotNghiep( $university->id, $year, 'cao_dang' );

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'slug', 'year', 'title', 'totNghiep', 'sinhVienChinhQuy', 'sinhVienCaoDang' ) );
	}

	public function create( $slug, $year ) {
		$title = 'Quản lý sinh viên tốt nhiệp';

		$university = University::findBySlug( $slug );

		$totNghiep = TotNghiep::findByYear( $university->id, $year );

		$sinhVienChinhQuy = TinhTrangTotNghiep::findByYearAndType( $university->id, $year, 'chinh_quy' );
		$sinhVienCaoDang  = TinhTrangTotNghiep::findByYearAndType( $university->id, $year, 'cao_dang' );

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'slug', 'year', 'title', 'totNghiep', 'sinhVienChinhQuy', 'sinhVienCaoDang' ) );
	}

	public function postCreate( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $this->validate( $request, [
			'nghien_cuu_sinh'         => 'numeric',
			'hoc_vien_cao_hoc'        => 'numeric',
			'dh_he_chinh_quy'         => 'numeric',
			'dh_he_khong_chinh_quy'   => 'numeric',
			'cd_he_chinh_quy'         => 'numeric',
			'cd_he_khong_chinh_quy'   => 'numeric',
			'tccn_he_chinh_quy'       => 'numeric',
			'tccn_he_khong_chinh_quy' => 'numeric',
			'khac'                    => 'numeric',
		] );

		$totNghiep = TotNghiep::findByYear( $university->id, $year );

		$totNghiep->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function svDaiHoc( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );
		$request    = $this->validate( $request, [
			'so_luong_sv_tot_nghiep' => 'numeric',
			'ty_le_tot_nghiep'       => '',
			'cau_3_1'                => 'numeric',
			'cau_3_2'                => 'numeric',
			'cau_3_3'                => 'numeric',
			'cau_4_1'                => 'numeric',
			'cau_4_2'                => 'numeric',
			'cau_4_3'                => 'numeric',
			'cau_5_1'                => 'numeric',
			'cau_5_2'                => 'numeric',
			'cau_5_3'                => 'numeric',
		] );

		$sv = TinhTrangTotNghiep::findByYearAndType( $university->id, $year, 'chinh_quy' );
		$sv->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function svCaoDang( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );
		$request    = $this->validate( $request, [
			'so_luong_sv_tot_nghiep' => 'numeric',
			'ty_le_tot_nghiep'       => '',
			'cau_3_1'                => 'numeric',
			'cau_3_2'                => 'numeric',
			'cau_3_3'                => 'numeric',
			'cau_4_1'                => 'numeric',
			'cau_4_2'                => 'numeric',
			'cau_4_3'                => 'numeric',
			'cau_5_1'                => 'numeric',
			'cau_5_2'                => 'numeric',
			'cau_5_3'                => 'numeric',
		] );

		$sv = TinhTrangTotNghiep::findByYearAndType( $university->id, $year, 'cao_dang' );
		$sv->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	private function layDuLieuTotNghiep( $id, $year, $type ) {
		$sinhVienTotNghiep = [];

		for ( $i = ( $year - 4 ); $i <= $year; $i ++ ) {
			$sinhVienTotNghiep[ $i ] = TinhTrangTotNghiep::findByYearAndType( $id, $i, $type );
		}

		$result = [];

		for ( $i = ( $year - 4 ); $i <= $year; $i ++ ) {
			$result['year'][] = $i;
			if ( ! is_null( $sinhVienTotNghiep[ $i ] ) ) {
				$result['so_luong'][ $i ]         = $sinhVienTotNghiep[ $i ]->so_luong_sv_tot_nghiep;
				$result['ty_le_tot_nghiep'][ $i ] = $sinhVienTotNghiep[ $i ]->ty_le_tot_nghiep;
				$result['cau_3_1'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_3_1;
				$result['cau_3_2'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_3_2;
				$result['cau_3_3'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_3_3;
				$result['cau_4_1'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_4_1;
				$result['cau_4_2'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_4_2;
				$result['cau_4_3'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_4_3;
				$result['cau_5_1'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_5_1;
				$result['cau_5_2'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_5_2;
				$result['cau_5_3'][ $i ]          = $sinhVienTotNghiep[ $i ]->cau_5_3;
			} else {
				$result['so_luong'][ $i ]         = 0;
				$result['ty_le_tot_nghiep'][ $i ] = 0;
				$result['cau_3_1'][ $i ]          = 0;
				$result['cau_3_2'][ $i ]          = 0;
				$result['cau_3_3'][ $i ]          = 0;
				$result['cau_4_1'][ $i ]          = 0;
				$result['cau_4_2'][ $i ]          = 0;
				$result['cau_4_3'][ $i ]          = 0;
				$result['cau_5_1'][ $i ]          = 0;
				$result['cau_5_2'][ $i ]          = 0;
				$result['cau_5_3'][ $i ]          = 0;
			}

		}

		return json_decode( json_encode( $result, true ) );
	}
}
