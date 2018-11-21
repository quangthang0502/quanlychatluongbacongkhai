<?php

namespace App\Http\Controllers;

use App\Models\NghienCuuKhoaHoc\HoiThao;
use App\Models\NghienCuuKhoaHoc\NckhNghiemThu;
use App\Models\NghienCuuKhoaHoc\VietSach;
use App\Models\Student\SinhVien;
use App\Models\TaiChinh;
use App\Models\TotNghiep\TinhTrangTotNghiep;
use App\Models\University;
use App\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

	public function dashboard() {

		if ( is_null( session()->get( 'userData' ) ) ) {
			return redirect()->route( 'logout' );
		}
		/** @var User $user */
		$user = Auth::user();

		if ( $user->type == 3 || $user->type == 4 ) {
			$university = University::find( $user->university_id );

			return redirect()->route( 'dashboard.university', $university->slug );
		}
		$title = 'Dashboard';

		$universities = University::all();

		return view( 'admin.' . __FUNCTION__, compact( 'title', 'universities' ) );
	}

	public function dashboardUniversity( $slug ) {
		if ( is_null( session()->get( 'userData' ) ) ) {
			return redirect()->route( 'logout' );
		}
		$university = University::findBySlug( $slug );

		$title = $university->vi_ten;

		$thisYear = date( 'Y' );

		$label = [];
		for ( $i = $thisYear; $i > $thisYear - 5; $i -- ) {
			$label[] = (string) $i;
		}

		$svTotNghiep = $this->sinhVienTotNghiep( $university->id, $thisYear );

		$nckh    = $this->duLieuNckh( $university, $thisYear );
		$sach    = $this->sach( $university, $thisYear );
		$hoiThao = $this->hoiThao( $university, $thisYear );
		$nhapHoc = $this->nhapHoc( $university, $thisYear );
		$taiChinh = $this->taiChinh( $university, $thisYear );

		return view( 'dashboard.dashboard',
			compact( 'title', 'university', 'slug', 'gioiThieu',
				'label', 'svTotNghiep', 'nckh', 'sach', 'hoiThao', 'nhapHoc', 'taiChinh' ) );
	}

	private function sinhVienTotNghiep( $id, $year ) {
		$result = [];
		for ( $i = $year; $i > $year - 5; $i -- ) {
			$tn = TinhTrangTotNghiep::findByYearAndType( $id, $i, 'chinh_quy' );
			if ( is_null( $tn ) ) {
				$result[ $i ] = 0;
			} else {
				$result[ $i ] = $tn->so_luong_sv_tot_nghiep;
			}
		}

		return $result;
	}

	private function duLieuNckh( $university, $year ) {

		$result = [];
		for ( $i = 0; $i < 5; $i ++ ) {
			$nckh = NckhNghiemThu::getSoLuongNckhByYear( $university->id, $year - $i );
			if ( is_null( $nckh ) ) {
				$result[ $year - $i ] = 0;
			} else {
				$result[ $year - $i ] = $nckh->cap_nn + $nckh->cap_bo + $nckh->cap_truong;
			}
		}

		return $result;
	}

	private function sach( $university, $year ) {

		$result = [];
		for ( $i = 0; $i < 5; $i ++ ) {
			$sach = VietSach::getSoLuongSachByYear( $university->id, $year - $i );
			if ( is_null( $sach ) ) {
				$result[ $year - $i ] = 0;
			} else {
				$result[ $year - $i ] = $sach->sach_chuyen_khao + $sach->sach_giao_trinh + $sach->sach_tham_khao + $sach->sach_huong_dan;
			}
		}

		return $result;
	}

	private function hoiThao( $university, $year ) {

		$result = [];
		for ( $i = 0; $i < 5; $i ++ ) {
			$hoiThao = HoiThao::getSoLuongHoiThaoByYear( $university->id, $year - $i );
			if ( is_null( $hoiThao ) ) {
				$result[ $year - $i ] = 0;
			} else {
				$result[ $year - $i ] = $hoiThao->quoc_te + $hoiThao->trong_nuoc + $hoiThao->cap_truong;
			}
		}

		return $result;
	}

	private function nhapHoc( $university, $year ) {

		$result = [];
		for ( $i = 0; $i < 5; $i ++ ) {
			$sinhVien = SinhVien::findByYear( $university->id, $year - $i, 'dai_hoc' );
			if ( is_null( $sinhVien ) ) {
				$result[ $year - $i ] = 0;
			} else {
				$result[ $year - $i ] = ( $sinhVien->sl_nhap_hoc != null ) ? $sinhVien->sl_nhap_hoc : 0;
			}
		}

		return $result;
	}
	private function taiChinh( $university, $year ) {

		$result = [];
		for ( $i = 0; $i < 5; $i ++ ) {
			$taiChinh = TaiChinh::getTaiChinhByYear( $university->id, $year - $i );
			if ( is_null( $taiChinh ) ) {
				$result[ $year - $i ] = 0;
			} else {
				$result[ $year - $i ] = $taiChinh->tong_kinh_phi;
			}
		}

		return $result;
	}
}
