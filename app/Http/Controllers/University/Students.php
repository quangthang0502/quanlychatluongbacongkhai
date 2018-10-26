<?php

namespace App\Http\Controllers\University;

use App\Models\Student\PhanLoaiSinhVien;
use App\Models\Student\SinhVien;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Students extends Controller {
	//
	const VIEW_PATH = 'student.';

	public function index( $slug, $year ) {
		$title = 'Quản lý sinh viên nhập học';

		$university = University::findBySlug( $slug );

		$sinhVienDaiHoc    = SinhVien::findByManyYear( $university->id, $year, 'dai_hoc' );
		$sinhVienLienThong = SinhVien::findByManyYear( $university->id, $year, 'lien_thong' );
		$sinhVienSauDaiHoc = SinhVien::findByManyYear( $university->id, $year, 'sau_dai_hoc' );
		$phanLoaiSinhVien  = PhanLoaiSinhVien::findByManyYear( $university->id, $year );

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'slug', 'year', 'title', 'sinhVienDaiHoc', 'sinhVienLienThong', 'sinhVienSauDaiHoc', 'phanLoaiSinhVien' ) );
	}

	public function create( $slug, $year ) {
		$title      = 'Nhập thông tin sinh viên nhập học năm ' . $year;
		$university = University::findBySlug( $slug );

		$sinhVienDaiHoc    = SinhVien::findByYear( $university->id, $year, 'dai_hoc' );
		$sinhVienLienThong = SinhVien::findByYear( $university->id, $year, 'lien_thong' );
		$sinhVienSauDaiHoc = SinhVien::findByYear( $university->id, $year, 'sau_dai_hoc' );

		$phanLoaiSinhVien = PhanLoaiSinhVien::findByYear( $university->id, $year );

		if ( $sinhVienDaiHoc == null ) {
			SinhVien::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
				'trinh_do'        => 'dai_hoc'
			] );
			$sinhVienDaiHoc = SinhVien::findByYear( $university->id, $year, 'dai_hoc' );
		}

		if ( $sinhVienLienThong == null ) {
			SinhVien::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
				'trinh_do'        => 'lien_thong'
			] );
			$sinhVienLienThong = SinhVien::findByYear( $university->id, $year, 'lien_thong' );
		}

		if ( $sinhVienSauDaiHoc == null ) {
			SinhVien::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
				'trinh_do'        => 'sau_dai_hoc',
				'diem_tb'         => 1
			] );
			$sinhVienSauDaiHoc = SinhVien::findByYear( $university->id, $year, 'sau_dai_hoc' );
		}

		if ( $phanLoaiSinhVien == null ) {
			PhanLoaiSinhVien::create( [
				'universities_id' => $university->id,
				'thong_ke_nam'    => $year,
			] );
			$phanLoaiSinhVien = PhanLoaiSinhVien::findByYear( $university->id, $year );
		}

		return view( self::VIEW_PATH . __FUNCTION__,
			compact( 'slug', 'year', 'title', 'sinhVienDaiHoc',
				'sinhVienLienThong', 'sinhVienSauDaiHoc', 'phanLoaiSinhVien' ) );
	}

	public function postCreate( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );

		$request = $this->validate( $request, [
			'sl_du_thi_dai_hoc'          => '',
			'sl_trung_tuyen_dai_hoc'     => '',
			'sl_nhap_hoc_dai_hoc'        => '',
			'sl_sv_quoc_te_dai_hoc'      => '',
			'trinh_do_dai_hoc'           => 'required',
			'diem_dau_vao_dai_hoc'       => '',
			'diem_tb_dai_hoc'            => '',
			'sl_du_thi_lien_thong'       => '',
			'sl_trung_tuyen_lien_thong'  => '',
			'sl_nhap_hoc_lien_thong'     => '',
			'sl_sv_quoc_te_lien_thong'   => '',
			'trinh_do_lien_thong'        => 'required',
			'diem_dau_vao_lien_thong'    => '',
			'diem_tb_lien_thong'         => '',
			'sl_du_thi_sau_dai_hoc'      => '',
			'sl_trung_tuyen_sau_dai_hoc' => '',
			'sl_nhap_hoc_sau_dai_hoc'    => '',
			'sl_sv_quoc_te_sau_dai_hoc'  => '',
			'trinh_do_sau_dai_hoc'       => 'required',
			'diem_dau_vao_sau_dai_hoc'   => '',
			'diem_tb_sau_dai_hoc'        => '',
		] );

		$sinhVienDaiHoc    = SinhVien::findByYear( $university->id, $year, 'dai_hoc' );
		$sinhVienLienThong = SinhVien::findByYear( $university->id, $year, 'lien_thong' );
		$sinhVienSauDaiHoc = SinhVien::findByYear( $university->id, $year, 'sau_dai_hoc' );

		$sinhVienDaiHoc->update( [
			'sl_du_thi'      => $request['sl_du_thi_dai_hoc'],
			'sl_trung_tuyen' => $request['sl_trung_tuyen_dai_hoc'],
			'sl_nhap_hoc'    => $request['sl_nhap_hoc_dai_hoc'],
			'sl_sv_quoc_te'  => $request['sl_sv_quoc_te_dai_hoc'],
			'trinh_do'       => $request['trinh_do_dai_hoc'],
			'diem_dau_vao'   => $request['diem_dau_vao_dai_hoc'],
			'diem_tb'        => $request['diem_tb_dai_hoc'],
		] );

		$sinhVienLienThong->update( [
			'sl_du_thi'      => $request['sl_du_thi_lien_thong'],
			'sl_trung_tuyen' => $request['sl_trung_tuyen_lien_thong'],
			'sl_nhap_hoc'    => $request['sl_nhap_hoc_lien_thong'],
			'sl_sv_quoc_te'  => $request['sl_sv_quoc_te_lien_thong'],
			'trinh_do'       => $request['trinh_do_lien_thong'],
			'diem_dau_vao'   => $request['diem_dau_vao_lien_thong'],
			'diem_tb'        => $request['diem_tb_lien_thong'],
		] );

		$sinhVienSauDaiHoc->update( [
			'sl_du_thi'      => $request['sl_du_thi_sau_dai_hoc'],
			'sl_trung_tuyen' => $request['sl_trung_tuyen_sau_dai_hoc'],
			'sl_nhap_hoc'    => $request['sl_nhap_hoc_sau_dai_hoc'],
			'sl_sv_quoc_te'  => $request['sl_sv_quoc_te_sau_dai_hoc'],
			'trinh_do'       => $request['trinh_do_sau_dai_hoc'],
			'diem_dau_vao'   => $request['diem_dau_vao_sau_dai_hoc'],
			'diem_tb'        => $request['diem_tb_sau_dai_hoc'],
		] );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function updateStudents( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );

		$request = $this->validate( $request, [
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

		$phanLoaiSinhVien = PhanLoaiSinhVien::findByYear( $university->id, $year );

		$phanLoaiSinhVien->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}
}
