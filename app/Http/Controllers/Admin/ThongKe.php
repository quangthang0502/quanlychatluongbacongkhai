<?php

namespace App\Http\Controllers\Admin;

use App\Models\Canbo\GiangVien;
use App\Models\Canbo\PhanLoaiCanBo;
use App\Models\CoSoVatChat;
use App\Models\DaoTao\ChuyenNganhDaoTao;
use App\Models\DaoTao\DaoTao;
use App\Models\Student\KiTucXa;
use App\Models\Student\PhanLoaiSinhVien;
use App\Models\Student\SinhVien;
use App\Models\TaiChinh;
use App\Models\TotNghiep\TinhTrangTotNghiep;
use App\Models\TotNghiep\TotNghiep;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongKe extends Controller {
	//
	const VIEW_PATH = 'admin.thongke.';

	public function index( $year ) {
		$title = 'Bảng thống kê dữ liệu ba công khai năm ' . $year;

		$universities = University::all();

		$data = [];

		foreach ( $universities as $item ) {
			$data[] = $this->thongKe( $item, $year );
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( 'admin.thongke.' . __FUNCTION__, compact( 'title', 'year', 'data' ) );
	}

	public function coSoVatChat( $year ) {
		$title = 'Bảng thống kê dữ liệu ba công khai năm ' . $year;

		$universities = University::all();
		$data         = [];

		foreach ( $universities as $item ) {
			$data[] = [
				'name'           => $item->vi_ten,
				'co_so_vat_chat' => $this->checkCoSoVatChat( $item->id, $year )
			];
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( 'admin.thongke.' . __FUNCTION__, compact( 'title', 'year', 'data' ) );
	}

	public function giangVien( $year ) {
		$title = 'Bảng thống kê dữ liệu ba công khai năm ' . $year;

		$universities = University::all();
		$data         = [];

		foreach ( $universities as $item ) {
			$data[] = [
				'name'       => $item->vi_ten,
				'giang_vien' => $this->checkGiangVien( $item->id, $year )
			];
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( 'admin.thongke.' . __FUNCTION__, compact( 'title', 'year', 'data' ) );
	}

	public function sinhVien( $year ) {
		$title = 'Bảng thống kê dữ liệu ba công khai năm ' . $year;

		$universities = University::all();
		$data         = [];

		foreach ( $universities as $item ) {
			$data[] = [
				'name'       => $item->vi_ten,
				'sinh_vien'  => $this->checkSinhVien( $item->id, $year, $item->type ),
				'giang_vien' => $this->checkGiangVien( $item->id, $year )
			];
		}

		$data = json_decode( json_encode( $data, true ) );

		return view( 'admin.thongke.' . __FUNCTION__, compact( 'title', 'year', 'data' ) );
	}

	private function thongKe( $university, $year ) {
		$result         = [];
		$result['name'] = $university->vi_ten;

		$result['dao_tao'] = $this->checkDaoTao( $university->id, $year );

		$result['co_so_vat_chat'] = $this->checkCoSoVatChat( $university->id, $year );

		$result['giang_vien'] = $this->checkGiangVien( $university->id, $year );

		$result['sinh_vien'] = $this->checkSinhVien( $university->id, $year, $university->type );

		return $result;
	}

	private function checkDaoTao( $id, $year ) {

		/** @var DaoTao $daoTao */
		$daoTao = DaoTao::findByYear( $id, $year );
		if ( is_null( $daoTao ) ) {
			return [
				'dao_tao_tien_sy'  => '-',
				'dao_tao_thac_sy'  => '-',
				'dao_tao_dai_hoc'  => '-',
				'dao_tao_cao_dang' => '-',
				'dao_tao_tccn'     => '-',
				'dao_tao_nghe'     => '-',
				'dao_tao_khac'     => '-',
			];
		}
		/** @var ChuyenNganhDaoTao $chuyenNganhDaoTao */
		$chuyenNganhDaoTao = $daoTao->chuyenNganhDaoTao();
		if ( is_null( $chuyenNganhDaoTao ) ) {
			return [
				'dao_tao_tien_sy'  => '-',
				'dao_tao_thac_sy'  => '-',
				'dao_tao_dai_hoc'  => '-',
				'dao_tao_cao_dang' => '-',
				'dao_tao_tccn'     => '-',
				'dao_tao_nghe'     => '-',
				'dao_tao_khac'     => '-',
			];
		}

		return [
			'dao_tao_tien_sy'  => $chuyenNganhDaoTao->dao_tao_tien_sy,
			'dao_tao_thac_sy'  => $chuyenNganhDaoTao->dao_tao_thac_sy,
			'dao_tao_dai_hoc'  => $chuyenNganhDaoTao->dao_tao_dai_hoc,
			'dao_tao_cao_dang' => $chuyenNganhDaoTao->dao_tao_cao_dang,
			'dao_tao_tccn'     => $chuyenNganhDaoTao->dao_tao_tccn,
			'dao_tao_nghe'     => $chuyenNganhDaoTao->dao_tao_nghe,
			'dao_tao_khac'     => $chuyenNganhDaoTao->dao_tao_khac,
		];
	}

	private function checkCoSoVatChat( $id, $year ) {

		$coSoVatChat = CoSoVatChat::getCoSoVatChatByYear( $id, $year );

		$ktx = KiTucXa::findByYear( $id, $year );

		$taiChinh = TaiChinh::getTaiChinhByYear( $id, $year );

		if ( is_null( $coSoVatChat ) || is_null( $ktx ) || is_null( $taiChinh ) ) {
			return [
				'tong_dien_tich'          => '-',
				'dien_tich_phong_hoc'     => '-',
				'ty_so_dien_tich_tren_sv' => '-',
				'so_sach_tv'              => '-',
				'so_may_tinh'             => '-',
				'ty_so_mt_tren_sv'        => '-',
				'dien_tich_ktx'           => '-',
				'sinh_vien_ktx'           => '-',
				'tong_kinh_phi'           => '-',
				'tong_thu_hoc_phi'        => '-',
			];
		}

		return [
			'tong_dien_tich'          => $coSoVatChat->tong_dien_tich,
			'dien_tich_phong_hoc'     => $coSoVatChat->dien_tich_phong_hoc,
			'ty_so_dien_tich_tren_sv' => $coSoVatChat->ty_so_dien_tich_tren_sv,
			'so_sach_tv'              => $coSoVatChat->so_sach_tv,
			'so_may_tinh'             => $coSoVatChat->so_may_tinh_vp + $coSoVatChat->so_may_tinh_sv,
			'ty_so_mt_tren_sv'        => $coSoVatChat->ty_so_mt_tren_sv,
			'dien_tich_ktx'           => $ktx->tong_dien_tich,
			'sinh_vien_ktx'           => ( $ktx->duoc_o == 0 ) ? '-' : ( round( $ktx->tong_dien_tich / $ktx->duoc_o, 2 ) ),
			'tong_kinh_phi'           => $taiChinh->tong_kinh_phi,
			'tong_thu_hoc_phi'        => $taiChinh->tong_thu_hoc_phi,
		];
	}

	private function checkGiangVien( $id, $year ) {
		$canBo = PhanLoaiCanBo::findByYear( $id, $year );

		$giangVien = GiangVien::findByYear( $id, $year );

		if ( is_null( $canBo ) || is_null( $giangVien ) ) {
			$result['giang_vien_co_huu'] = '-';
			$result['giang_vien_can_bo'] = '-';
			$result['tien_si_can_bo']    = '-';
			$result['thac_si_can_bo']    = '-';
			return $result;
		}

		$canBoCoHuu     = $canBo->bien_che_nam + $canBo->bien_che_nu + $canBo->hop_dong_nam + $canBo->hop_dong_nu;
		$giangVienCoHuu = 0;
		$tienSi         = 0;
		$thacSi         = 0;
		foreach ( $giangVien as $item ) {
			$giangVienCoHuu += $item->gv_bien_che;
			$giangVienCoHuu += $item->gv_hop_dong;
			if ( $item->trinh_do == 3 || $item->trinh_do == 4 ) {
				$tienSi += $item->so_luong;
			}
			if ( $item->trinh_do == 4 ) {
				$thacSi += $item->so_luong;
			}
		}

		$result['giang_vien_co_huu'] = $giangVienCoHuu;
		$result['giang_vien_can_bo'] = ( $canBoCoHuu == 0 ) ? '-' : round( ( $giangVienCoHuu * 100 ) / $canBoCoHuu, 2 );
		$result['tien_si_can_bo']    = ( $canBoCoHuu == 0 ) ? '-' : round( ( $tienSi * 100 ) / $canBoCoHuu, 2 );
		$result['thac_si_can_bo']    = ( $canBoCoHuu == 0 ) ? '-' : round( ( $thacSi * 100 ) / $canBoCoHuu, 2 );

		return $result;
	}

	public function checkSinhVien( $id, $year, $loaiTruong ) {
		$sinhVien = PhanLoaiSinhVien::findByYear( $id, $year );

		if ( is_null( $sinhVien ) ) {
			$sinhVienChinhQuy = 0;
		} else {
			$sinhVienChinhQuy = $sinhVien->nghien_cuu_sinh
			                    + $sinhVien->hoc_vien_cao_hoc
			                    + $sinhVien->dh_he_chinh_quy
			                    + $sinhVien->cd_he_chinh_quy
			                    + $sinhVien->tccn_he_chinh_quy;
		}


		if ( $loaiTruong == 'dai_hoc' ) {
			$tinhTrangTN = TinhTrangTotNghiep::findByYearAndType( $id, $year, 'chinh_quy' );
			if (is_null($tinhTrangTN)){
				$tinhTrangTN = TinhTrangTotNghiep::create( [
					'universities_id' => $id,
					'thong_ke_nam'    => $year,
					'type'            => 'chinh_quy'
				] )->refresh();
			}
		} else {
			$tinhTrangTN = TinhTrangTotNghiep::findByYearAndType( $id, $year, 'cao_dang' );
			if (is_null($tinhTrangTN)){
				$tinhTrangTN = TinhTrangTotNghiep::create( [
					'universities_id' => $id,
					'thong_ke_nam'    => $year,
					'type'            => 'cao_dang'
				] )->refresh();
			}
		}


		$totNghiep     = TotNghiep::findByYear( $id, $year );
		if (is_null($totNghiep)){
			$sinhTotNghiep = 0;
		}else {
			$sinhTotNghiep = $totNghiep->dh_he_chinh_quy
			                 + $totNghiep->cd_he_chinh_quy
			                 + $totNghiep->tccn_he_chinh_quy;
		}


		return [
			'sinh_vien_chinh_quy'      => $sinhVienChinhQuy,
			'sinh_vien_tot_nghiep'     => $sinhTotNghiep,
			'hoc_100_kien_thuc'        => ( $tinhTrangTN->cau_3_1 == 0 ) ? '-' : $tinhTrangTN->cau_3_1,
			'hoc_50_kien_thuc'         => ( $tinhTrangTN->cau_3_2 == 0 ) ? '-' : $tinhTrangTN->cau_3_2,
			'dung_nganh'               => ( $tinhTrangTN->cau_4_1 == 0 ) ? '-' : $tinhTrangTN->cau_4_1,
			'trai_nganh'               => ( $tinhTrangTN->cau_4_2 == 0 ) ? '-' : $tinhTrangTN->cau_4_2,
			'thu_nhap'                 => ( $tinhTrangTN->cau_4_3 == 0 ) ? '-' : $tinhTrangTN->cau_4_3,
			'dap_ung_nha_truong'       => ( $tinhTrangTN->cau_5_1 == 0 ) ? '-' : $tinhTrangTN->cau_5_1,
			'khong_dap_ung_nha_truong' => ( $tinhTrangTN->cau_5_2 == 0 ) ? '-' : $tinhTrangTN->cau_5_2,
		];

	}
}
