<?php

namespace App\Http\Controllers;

use App\Models\CanBo\BoPhan;
use App\Models\CanBo\CanBoChuChot;
use App\Models\CoSoVatChat;
use App\Models\TaiChinh;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;


class ImportData extends Controller {
	//
	public function index( $slug, $year ) {
		$title = 'Nhập thông tin ba công khai năm ' . $year;

		return view( 'import.index', compact( 'title', 'year', 'slug' ) );
	}

	public function create( $slug, $year, Request $request ) {
		$university = University::findBySlug( $slug );

		$dataImport = [];

		if ( $request->hasFile( 'file' ) ) {
			$file = $request->file( 'file' );

			Excel::selectSheets( 'co_so_vat_chat' )->load( $file, function ( $reader ) use ( $university ) {
				$data = $reader->toArray();
				foreach ( $data as $item ) {
					$xxx = [
						'universities_id'         => $university->id,
						'nam_thong_ke'            => $item['nam'],
						'tong_dien_tich'          => $item['dat_su_dung'],
						'noi_lam_viec'            => $item['noi_lam_viec'],
						'noi_hoc'                 => $item['noi_hoc'],
						'noi_vui_choi'            => $item['noi_vui_choi'],
						'dien_tich_phong_hoc'     => $item['tong_dien_tich_phong_hoc'],
						'ty_so_dien_tich_tren_sv' => $item['ty_so_dt_phong_hoc_tren_sv'],
						'so_sach_tv'              => $item['so_sach_trong_thu_vien'],
						'sach_dao_tao'            => $item['so_sach_dao_tao'],
						'so_may_tinh_vp'          => $item['may_tinh_van_phong'],
						'so_may_tinh_sv'          => $item['may_tinh_hoc_tap'],
						'ty_so_mt_tren_sv'        => $item['ty_so_mt_tren_sv'],
					];

					$coSoVC = CoSoVatChat::getCoSoVatChatByYear( $university->id, $item['nam'] );
					if ( is_null( $coSoVC ) ) {
						CoSoVatChat::create( $xxx );
					} else {
						$coSoVC->update( $xxx );
					}

					$taiChinh = TaiChinh::getTaiChinhByYear( $university->id, $item['nam'] );
					if ( is_null( $taiChinh ) ) {
						TaiChinh::create( [
							'universities_id'  => $university->id,
							'nam_thong_ke'     => $item['nam'],
							'tong_kinh_phi'    => $item['tong_kinh_phi'],
							'tong_thu_hoc_phi' => $item['tong_thu_hoc_phi'],
						] );
					} else {
						$taiChinh->update( [
							'tong_kinh_phi'    => $item['tong_kinh_phi'],
							'tong_thu_hoc_phi' => $item['tong_thu_hoc_phi'],
						] );
					}
				}
			} );

			$danhSachBoPhan = [];
			$boPhan     = BoPhan::all();
			foreach ( $boPhan as $item ) {
				$danhSachBoPhan[ $item->id ] = $item->name;
			}
			Excel::selectSheets( 'can_bo_chu_chot' )->load( $file, function ( $reader ) use ( &$dataImport, $university, $danhSachBoPhan ) {
				$data = $reader->toArray();
				foreach ( $data as $item ) {
					$xxx                    = [];
					$xxx['ho_va_ten']       = $item['ho_va_ten'];
					$xxx['nam_sinh']        = $item['nam_sinh'];
					$xxx['chuc_vu']         = $item['chuc_danh'];
					$xxx['hoc_vi']          = $item['hoc_vi'];
					$xxx['universities_id'] = $university->id;
					$xxx['thong_ke_nam']    = $item['nam_thong_ke'];
					$xxx['bo_phan_id']      = array_search( $item['bo_phan'], $danhSachBoPhan );

					$dataImport[] = $xxx;
				}
			} );

			if (!empty($dataImport)){
				CanBoChuChot::insert( $dataImport );
			}

		}

		return back()->with( 'success', 'Nhập liệu thành công' );
	}

	public function downloadFile(){
		$file_path = storage_path() .'/file/Form.xlsx';
		if (file_exists($file_path))
		{
			// Send Download
			return Response::download($file_path, 'Form.xlsx', [
				'Content-Length: '. filesize($file_path)
			]);
		}
		else
		{
			// Error
			exit('Requested file does not exist on our server!');
		}
	}
}
