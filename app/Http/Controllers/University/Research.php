<?php

namespace App\Http\Controllers\University;


use App\Http\Controllers\Controller;
use App\Models\Canbo\GiangVien;
use App\Models\NghienCuuKhoaHoc\BangSangChe;
use App\Models\NghienCuuKhoaHoc\HoiThao;
use App\Models\NghienCuuKhoaHoc\NckhNghiemThu;
use App\Models\NghienCuuKhoaHoc\TapChi;
use App\Models\NghienCuuKhoaHoc\VietSach;
use App\Models\University;
use Illuminate\Http\Request;

class Research extends Controller {
	public function index( $slug, $year ) {
		$title      = "Nghiên cứu khoa học và chuyển giao công nghệ";
		$university = University::findBySlug( $slug );

		$dataNckh    = $this->duLieuNckh( $university, $year );
		$soLuongNckh = $dataNckh['so_luong_nckh'];
		$doanhThu    = $dataNckh['doanh_thu'];

		$dataSach    = $this->duLieuVietSach( $university, $year );
		$soLuongSach = $dataSach['so_luong_sach'];

		$dataTapChi    = $this->duLieuTapChi( $university, $year );
		$soLuongTapChi = $dataTapChi['so_luong_tap_chi'];

		$dataHoiThao    = $this->duLieuHoiThao( $university, $year );
		$soLuongHoiThao = $dataHoiThao['so_luong_hoi_thao'];

		$sangChe = $this->duLieuBangSangChe( $university, $year );

		return view( 'research.' . __FUNCTION__,
			compact( 'slug', 'title', 'year', 'soLuongNckh', 'doanhThu',
				'soLuongSach', 'soLuongTapChi', 'soLuongHoiThao', 'sangChe' ) );

	}

	public function create( $slug, $year ) {
		$title      = "Nghiên cứu khoa học và chuyển giao công nghệ";
		$university = University::findBySlug( $slug );

		$sangChe = BangSangChe::getBangSangCheByYear( $university->id, $year );
		$hoiThao = HoiThao::getSoLuongHoiThaoByYear( $university->id, $year );
		$tapChi  = TapChi::getSoLuongTapChiByYear( $university->id, $year );
		$sach    = VietSach::getSoLuongSachByYear( $university->id, $year );
		$nckh    = NckhNghiemThu::getSoLuongNckhByYear( $university->id, $year );

		return view( 'research.' . __FUNCTION__,
			compact( 'slug', 'title', 'year', 'sangChe', 'tapChi', 'hoiThao', 'sach', 'nckh' ) );
	}

	public function postCreate( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $request->only( [
			'cap_nn',
			'cap_bo',
			'cap_truong',
			'doanh_thu',
			'ti_so_doanh_thu',
			'ti_le_doanh_thu',
			'nam_thong_ke',
		] );

		$nckh = NckhNghiemThu::getSoLuongNckhByYear( $university->id, $year );

		$nckh->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function suaSach( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $request->only( [
			'sach_chuyen_khao',
			'sach_giao_trinh',
			'sach_tham_khao',
			'sach_huong_dan',
		] );

		$sach    = VietSach::getSoLuongSachByYear( $university->id, $year );

		$sach->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function tapChi( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $request->only( [
			'quoc_te',
			'trong_nuoc',
			'cap_truong',
		] );

		$tapChi  = TapChi::getSoLuongTapChiByYear( $university->id, $year );

		$tapChi->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function hoiThao( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $request->only( [
			'quoc_te',
			'trong_nuoc',
			'cap_truong',
		] );

		$hoiThao = HoiThao::getSoLuongHoiThaoByYear( $university->id, $year );

		$hoiThao->update( $request );

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	public function bangSangche( $slug, $year, Request $request ) {

		$university = University::findBySlug( $slug );
		$request    = $request->only( [
			'noi_dung',
		] );

		$sangChe = BangSangChe::getBangSangCheByYear( $university->id, $year );

		$sangChe->noi_dung =  $request['noi_dung'];
		$sangChe->save();

		return back()->with( 'success', 'Cập nhập thành công!' );
	}

	private function duLieuBangSangChe( $university, $year ) {
		$bangSangChe = [];

		for ( $i = 0; $i < 5; $i ++ ) {
			$sangChe = BangSangChe::getBangSangCheByYear( $university->id, $year - $i );
			if ( is_null( $sangChe ) ) {
				if ( $i == 0 ) {
					$sangChe = BangSangChe::create( [
						'universities_id' => $university->id,
						'nam_thong_ke'    => $year,
					] )->refresh();
				} else {
					continue;
				}
			}
			$bangSangChe[ $year - $i ]['noi_dung'] = $sangChe['noi_dung'];
		}

		return $bangSangChe;
	}

	private function duLieuHoiThao( $university, $year ) {
		$soLuongHoiThao = [
			'quoc_te'       => [
				'name'  => 'Hội thảo quốc tế',
				'he_so' => 1,
				'tong'  => 0
			],
			'trong_nuoc'    => [
				'name'  => 'Hội thảo trong nước',
				'he_so' => 0.5,
				'tong'  => 0
			],
			'cap_truong'    => [
				'name'  => 'Hội thảo cấp trường',
				'he_so' => 0.25,
				'tong'  => 0
			],
			'tong_quy_doi'  => 0,
			'ty_so_bai_bao' => 0
		];

		for ( $i = 0; $i < 5; $i ++ ) {
			$hoiThao = HoiThao::getSoLuongHoiThaoByYear( $university->id, $year - $i );
			if ( is_null( $hoiThao ) ) {
				if ( $i == 0 ) {
					$hoiThao = HoiThao::create( [
						'universities_id' => $university->id,
						'nam_thong_ke'    => $year,
					] )->refresh();
				} else {
					continue;
				}
			}
//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;

			$soLuongHoiThao['quoc_te'][ $year - $i ] = $hoiThao['quoc_te'];
			$soLuongHoiThao['quoc_te']['tong']       += $hoiThao['quoc_te'] * $soLuongHoiThao['quoc_te']['he_so'];
			$soLuongHoiThao['tong_quy_doi']          += $hoiThao['quoc_te'] * $soLuongHoiThao['quoc_te']['he_so'];

			$soLuongHoiThao['trong_nuoc'][ $year - $i ] = $hoiThao['trong_nuoc'];
			$soLuongHoiThao['trong_nuoc']['tong']       += $hoiThao['trong_nuoc'] * $soLuongHoiThao['trong_nuoc']['he_so'];
			$soLuongHoiThao['tong_quy_doi']             += $hoiThao['trong_nuoc'] * $soLuongHoiThao['trong_nuoc']['he_so'];

			$soLuongHoiThao['cap_truong'][ $year - $i ] = $hoiThao['cap_truong'];
			$soLuongHoiThao['cap_truong']['tong']       += $hoiThao['cap_truong'] * $soLuongHoiThao['cap_truong']['he_so'];
			$soLuongHoiThao['tong_quy_doi']             += $hoiThao['cap_truong'] * $soLuongHoiThao['cap_truong']['he_so'];

			$soLuongHoiThao['ty_so_bai_bao'] = round( $soLuongHoiThao['tong_quy_doi'] / 173, 1 );
		}

		return [
			'so_luong_hoi_thao' => $soLuongHoiThao
		];
	}

	private function duLieuTapChi( $university, $year ) {
		$soLuongTapChi = [
			'quoc_te'       => [
				'name'  => 'Tạp chí KH quốc tế',
				'he_so' => 1.5,
				'tong'  => 0
			],
			'trong_nuoc'    => [
				'name'  => 'Tạp chí KH cấp Ngành trong nước',
				'he_so' => 1,
				'tong'  => 0
			],
			'cap_truong'    => [
				'name'  => 'Tạp chí/tập san của cấp trường',
				'he_so' => 0.5,
				'tong'  => 0
			],
			'tong_quy_doi'  => 0,
			'ty_so_tap_chi' => 0
		];

		for ( $i = 0; $i < 5; $i ++ ) {
			$tapChi = TapChi::getSoLuongTapChiByYear( $university->id, $year - $i );
			if ( is_null( $tapChi ) ) {
				if ( $i == 0 ) {
					$tapChi = TapChi::create( [
						'universities_id' => $university->id,
						'nam_thong_ke'    => $year,
					] )->refresh();
				} else {
					continue;
				}
			}
//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;

			$soLuongTapChi['quoc_te'][ $year - $i ] = $tapChi['quoc_te'];
			$soLuongTapChi['quoc_te']['tong']       += $tapChi['quoc_te'] * $soLuongTapChi['quoc_te']['he_so'];
			$soLuongTapChi['tong_quy_doi']          += $tapChi['quoc_te'] * $soLuongTapChi['quoc_te']['he_so'];

			$soLuongTapChi['trong_nuoc'][ $year - $i ] = $tapChi['trong_nuoc'];
			$soLuongTapChi['trong_nuoc']['tong']       += $tapChi['trong_nuoc'] * $soLuongTapChi['trong_nuoc']['he_so'];
			$soLuongTapChi['tong_quy_doi']             += $tapChi['trong_nuoc'] * $soLuongTapChi['trong_nuoc']['he_so'];

			$soLuongTapChi['cap_truong'][ $year - $i ] = $tapChi['cap_truong'];
			$soLuongTapChi['cap_truong']['tong']       += $tapChi['cap_truong'] * $soLuongTapChi['cap_truong']['he_so'];
			$soLuongTapChi['tong_quy_doi']             += $tapChi['cap_truong'] * $soLuongTapChi['cap_truong']['he_so'];

			$soLuongTapChi['ty_so_tap_chi'] = round( $soLuongTapChi['tong_quy_doi'] / 173, 1 );
		}

		return [
			'so_luong_tap_chi' => $soLuongTapChi
		];
	}

	private function duLieuVietSach( $university, $year ) {
		$soLuongSach = [
			'chuyen_khao'  => [
				'name'  => 'Sách chuyên khảo',
				'he_so' => 2.0,
				'tong'  => 0
			],
			'giao_trinh'   => [
				'name'  => 'Sách giáo trình',
				'he_so' => 1.5,
				'tong'  => 0
			],
			'tham_khao'    => [
				'name'  => 'Sách tham khảo',
				'he_so' => 1,
				'tong'  => 0
			],
			'huong_dan'    => [
				'name'  => 'Sách hướng dẫn',
				'he_so' => 0.5,
				'tong'  => 0
			],
			'tong_quy_doi' => 0,
			'ty_so_sach'   => 0
		];
		for ( $i = 0; $i < 5; $i ++ ) {
			$sach = VietSach::getSoLuongSachByYear( $university->id, $year - $i );
			if ( is_null( $sach ) ) {
				if ( $i == 0 ) {
					$sach = VietSach::create( [
						'universities_id' => $university->id,
						'nam_thong_ke'    => $year,
					] )->refresh();
				} else {
					continue;
				}
			}
//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;
			$soLuongSach['chuyen_khao'][ $year - $i ] = $sach['sach_chuyen_khao'];
			$soLuongSach['chuyen_khao']['tong']       += $sach['sach_chuyen_khao'] * $soLuongSach['chuyen_khao']['he_so'];
			$soLuongSach['tong_quy_doi']              += $sach['sach_chuyen_khao'] * $soLuongSach['chuyen_khao']['he_so'];

			$soLuongSach['giao_trinh'][ $year - $i ] = $sach['sach_giao_trinh'];
			$soLuongSach['giao_trinh']['tong']       += $sach['sach_giao_trinh'] * $soLuongSach['giao_trinh']['he_so'];
			$soLuongSach['tong_quy_doi']             += $sach['sach_giao_trinh'] * $soLuongSach['giao_trinh']['he_so'];

			$soLuongSach['tham_khao'][ $year - $i ] = $sach['sach_tham_khao'];
			$soLuongSach['tham_khao']['tong']       += $sach['sach_tham_khao'] * $soLuongSach['tham_khao']['he_so'];
			$soLuongSach['tong_quy_doi']            += $sach['sach_tham_khao'] * $soLuongSach['tham_khao']['he_so'];

			$soLuongSach['huong_dan'][ $year - $i ] = $sach['sach_huong_dan'];
			$soLuongSach['huong_dan']['tong']       += $sach['sach_huong_dan'] * $soLuongSach['huong_dan']['he_so'];
			$soLuongSach['tong_quy_doi']            += $sach['sach_huong_dan'] * $soLuongSach['huong_dan']['he_so'];

			$soLuongSach['ty_so_sach'] = round( $soLuongSach['tong_quy_doi'] / 173, 1 );
		}

		return [
			'so_luong_sach' => $soLuongSach
		];
	}

	private function duLieuNckh( $university, $year ) {
		$soLuongNckh = [
			'cap_nn'       => [
				'name'  => 'Đề tài cấp NN',
				'he_so' => 2.0,
				'tong'  => 0
			],
			'cap_bo'       => [
				'name'  => 'Đề tài cấp Bộ',
				'he_so' => 1.0,
				'tong'  => 0
			],
			'cap_truong'   => [
				'name'  => 'Đề tài cấp Trường',
				'he_so' => 0.5,
				'tong'  => 0
			],
			'tong_quy_doi' => 0,
			'ty_so_de_tai' => 0
		];

		$doanhThu = [];

		for ( $i = 0; $i < 5; $i ++ ) {
			$nckh = NckhNghiemThu::getSoLuongNckhByYear( $university->id, $year - $i );
			if ( is_null( $nckh ) ) {
				if ( $i == 0 ) {
					$nckh = NckhNghiemThu::create( [
						'universities_id' => $university->id,
						'nam_thong_ke'    => $year,
					] )->refresh();
				} else {
					continue;
				}

			}
			//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;
			$soLuongNckh['cap_nn'][ $year - $i ]     = $nckh['cap_nn'];
			$soLuongNckh['cap_nn']['tong']           += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
			$soLuongNckh['tong_quy_doi']             += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
			$soLuongNckh['cap_bo'][ $year - $i ]     = $nckh['cap_bo'];
			$soLuongNckh['cap_bo']['tong']           += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
			$soLuongNckh['tong_quy_doi']             += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
			$soLuongNckh['cap_truong'][ $year - $i ] = $nckh['cap_truong'];
			$soLuongNckh['cap_truong']['tong']       += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
			$soLuongNckh['tong_quy_doi']             += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
			$soLuongNckh['ty_so_de_tai']             = round( $soLuongNckh['tong_quy_doi'] / 173, 1 );
			$doanhThu[ $year - $i ]['doanh_thu']     = $nckh['doanh_thu'];
			$doanhThu[ $year - $i ]['ti_le']         = ( $nckh['kinh_phi'] != 0 ) ? round( $nckh['doanh_thu'] / $nckh['kinh_phi'], 1 ) : 0;
			$doanhThu[ $year - $i ]['ti_so']         = round( $nckh['doanh_thu'] / 173, 1 ); //so giao vien o dau
		}

		return [
			'so_luong_nckh' => $soLuongNckh,
			'doanh_thu'     => $doanhThu
		];
	}
}