<?php

namespace App\Http\Controllers;

use App\Models\CanBo\CanBoChuChot;
use App\Models\Canbo\GiangVien;
use App\Models\Canbo\PhanLoaiCanBo;
use App\Models\CanBo\TrinhDoNNTH;
use App\Models\CoSoVatChat;
use App\Models\DaoTao\DaoTao;
use App\Models\GioiThieu;
use App\Models\Student\KiTucXa;
use App\Models\Student\PhanLoaiSinhVien;
use App\Models\Student\SinhVien;
use App\Models\TaiChinh;
use App\Models\TotNghiep\TinhTrangTotNghiep;
use App\Models\TotNghiep\TotNghiep;
use App\Models\University;
use App\Models\NghienCuuKhoaHoc\BangSangChe;
use App\Models\NghienCuuKhoaHoc\HoiThao;
use App\Models\NghienCuuKhoaHoc\NckhNghiemThu;
use App\Models\NghienCuuKhoaHoc\TapChi;
use App\Models\NghienCuuKhoaHoc\VietSach;
use Illuminate\Http\Request;

class PrintController extends Controller {
	//
	public function index( $slug, $year ) {
		$title = 'In báo cáo ' . $year;

		$university = University::findBySlug( $slug );

		$gioiThieu = GioiThieu::find( $university->gioi_thieu_id );

//		================================
		$canBo = CanBoChuChot::findByUniversityAndYear( $university->id, $year );

		$dataCanBo = [];

		foreach ( $canBo as $item ) {
			/** @var CanBoChuChot $item */
			$boPhan      = $item->boPhan();
			$dataCanBo[] = [
				'hoc_vi'       => $item->hoc_vi,
				'chuc_vu'      => $item->chuc_vu,
				'ho_va_ten'    => $item->ho_va_ten,
				'nam_sinh'     => $item->nam_sinh,
				'bo_phan'      => $boPhan->name,
				'nhom_bo_phan' => $boPhan->group
			];
		}
		$dataCanBo = json_decode( json_encode( $dataCanBo, true ) );

//		=========================================
		$daoTao = DaoTao::findByYear( $university->id, $year );

		$chuyenNganhDaoTao = $daoTao->chuyenNganhDaoTao();
		$loaiHinhDaoTao    = $daoTao->loaiHinhDaoTao();

//		=========================================

		$phanLoaiCanBo = PhanLoaiCanBo::findByYear( $university->id, $year );
		$giangVien     = GiangVien::findByYear( $university->id, $year );
		$trinhDo       = TrinhDoNNTH::findByYear( $university->id, $year );

		$thongKeBang18 = [
			'so_luong'       => 0,
			'gv_bien_che'    => 0,
			'gv_hop_dong'    => 0,
			'gv_quan_ly'     => 0,
			'gv_thinh_giang' => 0,
			'gv_quoc_te'     => 0,
		];
		$gvQuyDoi      = [];
		$tongQuyDoi    = 0;
		$thongKeDoTuoi = [
			'giao_vien_nam' => 0,
			'giao_vien_nu'  => 0,
			'lv_1'          => 0,
			'lv_2'          => 0,
			'lv_3'          => 0,
			'lv_4'          => 0,
			'lv_5'          => 0,
		];
		foreach ( $giangVien as $item ) {
			$thongKeBang18['so_luong']       += $item->so_luong;
			$thongKeBang18['gv_bien_che']    += $item->gv_bien_che;
			$thongKeBang18['gv_hop_dong']    += $item->gv_hop_dong;
			$thongKeBang18['gv_quan_ly']     += $item->gv_quan_ly;
			$thongKeBang18['gv_thinh_giang'] += $item->gv_thinh_giang;
			$thongKeBang18['gv_quoc_te']     += $item->gv_quoc_te;

			$gvQuyDoi[ $item->trinh_do ] = heSoQuyDoi( $item->trinh_do, $university->type )
			                               * ( $item->gv_bien_che + $item->gv_hop_dong
			                                   + $item->gv_quan_ly * 0.3
			                                   + $item->gv_thinh_giang * 0.2
			                                   + $item->gv_quoc_te * 0.2 );

			$tongQuyDoi += $gvQuyDoi[ $item->trinh_do ];

			$doTuoi = json_decode( $item->do_tuoi );

			$thongKeDoTuoi['giao_vien_nam'] += $item->giao_vien_nam;
			$thongKeDoTuoi['giao_vien_nu']  += ( $item->so_luong - $item->giao_vien_nam );
			$thongKeDoTuoi['lv_1']          += $doTuoi->lv_1;
			$thongKeDoTuoi['lv_2']          += $doTuoi->lv_2;
			$thongKeDoTuoi['lv_3']          += $doTuoi->lv_3;
			$thongKeDoTuoi['lv_4']          += $doTuoi->lv_4;
			$thongKeDoTuoi['lv_5']          += $doTuoi->lv_5;
		}
		$thongKeBang18 = json_decode( json_encode( $thongKeBang18, true ) );

		$tiLeGiangVienCoHuu = 0;
		if ( $phanLoaiCanBo != null && $thongKeBang18->so_luong != 0 ) {
			$xgdj = $phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu
			        + $phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
			        $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu;

			$tiLeGiangVienCoHuu = ( $xgdj == 0 ) ? 0 : ( $thongKeBang18->so_luong - $thongKeBang18->gv_thinh_giang )
			                                           * 100 / ( $phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu
			                                                     + $phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
			                                                     $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu );
		}

//		===========================================

		$sinhVienDaiHoc    = SinhVien::findByManyYear( $university->id, $year, 'dai_hoc' );
		$sinhVienLienThong = SinhVien::findByManyYear( $university->id, $year, 'lien_thong' );
		$sinhVienSauDaiHoc = SinhVien::findByManyYear( $university->id, $year, 'sau_dai_hoc' );
		$phanLoaiSinhVien  = PhanLoaiSinhVien::findByManyYear( $university->id, $year );

//		==========================================

		$totNghiep = TotNghiep::findByManyYear( $university->id, $year );

		$tinhTrangTotNghiep = TinhTrangTotNghiep::findByYear( $university->id, $year );

		$sinhVienChinhQuy = $this->layDuLieuTotNghiep( $university->id, $year, 'chinh_quy' );
		$sinhVienCaoDang  = $this->layDuLieuTotNghiep( $university->id, $year, 'cao_dang' );
//		==========================================

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

//		========================================
		$coSoVatChat = CoSoVatChat::getCoSoVatChatByYear( $university->id, $year );
		$taiChinh = TaiChinh::getTaiChinhByManyYear( $university->id, $year );
		$kiTucXa  = KiTucXa::findByManyYear( $university->id, $year );

//		==========================================
		return view( 'print.index',
			compact( 'slug', 'year', 'title',
				'university', 'gioiThieu', 'dataCanBo',
				'chuyenNganhDaoTao', 'loaiHinhDaoTao', 'daoTao',
				'phanLoaiCanBo', 'giangVien',
				'trinhDo', 'thongKeBang18', 'tiLeGiangVienCoHuu', 'universityType', 'gvQuyDoi', 'tongQuyDoi', 'thongKeDoTuoi',
				'sinhVienDaiHoc', 'sinhVienLienThong', 'sinhVienSauDaiHoc', 'phanLoaiSinhVien',
				'totNghiep', 'sinhVienChinhQuy', 'sinhVienCaoDang',
				'soLuongNckh', 'doanhThu',
				'soLuongSach', 'soLuongTapChi', 'soLuongHoiThao', 'sangChe',
				'coSoVatChat', 'taiChinh', 'kiTucXa'
			) );
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
