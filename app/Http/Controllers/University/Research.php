<?php

namespace App\Http\Controllers\University;


use App\Http\Controllers\Controller;
use App\Models\Canbo\GiangVien;
use App\Models\NghienCuuKhoaHoc\NckhNghiemThu;
use App\Models\NghienCuuKhoaHoc\TapChi;
use App\Models\NghienCuuKhoaHoc\VietSach;
use App\Models\University;

class Research extends Controller
{
    public function index($slug, $year)
    {
        $title = "Nghiên cứu khoa học và chuyển giao công nghệ";
        $university = University::findBySlug($slug);

        $dataNckh = $this->duLieuNckh($university, $year);
        $soLuongNckh = $dataNckh['so_luong_nckh'];
        $doanhThu = $dataNckh['doanh_thu'];

        $dataSach = $this->duLieuVietSach($university, $year);
        $soLuongSach = $dataSach['so_luong_sach'];

        $dataTapChi = $this->duLieuTapChi($university,$year);
        $soLuongTapChi = $dataTapChi['so_luong_tap_chi'];

        return view('research.' . __FUNCTION__, compact('slug', 'title', 'year', 'soLuongNckh', 'doanhThu', 'soLuongSach','soLuongTapChi'));

    }

    private function duLieuTapChi($university, $year)
    {
        $soLuongTapChi = [
            'quoc_te' => [
                'name' => 'Tạp chí KH quốc tế',
                'he_so' => 1.5,
                'tong' => 0
            ],
            'trong_nuoc' => [
                'name' => 'Tạp chí KH cấp Ngành trong nước',
                'he_so' => 1,
                'tong' => 0
            ],
            'cap_truong' => [
                'name' => 'Tạp chí/tập san của cấp trường',
                'he_so' => 0.5,
                'tong' => 0
            ],
            'tong_quy_doi' => 0,
            'ty_so_sach' => 0
        ];

        for ($i = 0; $i < 5; $i++) {
            $tapChi = TapChi::getSoLuongTapChiByYear($university->id,$year);
            if (is_null($tapChi)) {
                continue;
            }
//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;

            $soLuongTapChi['quoc_te'][$year - $i] = $tapChi['quoc_te'];
            $soLuongTapChi['quoc_te']['tong'] += $tapChi['quoc_te'] * $soLuongTapChi['quoc_te']['he_so'];
            $soLuongTapChi['tong_quy_doi'] += $tapChi['quoc_te'] * $soLuongTapChi['quoc_te']['he_so'];

            $soLuongTapChi['trong_nuoc'][$year - $i] = $tapChi['trong_nuoc'];
            $soLuongTapChi['trong_nuoc']['tong'] += $tapChi['trong_nuoc'] * $soLuongTapChi['trong_nuoc']['he_so'];
            $soLuongTapChi['tong_quy_doi'] += $tapChi['trong_nuoc'] * $soLuongTapChi['trong_nuoc']['he_so'];

            $soLuongTapChi['cap_truong'][$year - $i] = $tapChi['cap_truong'];
            $soLuongTapChi['cap_truong']['tong'] += $tapChi['cap_truong'] * $soLuongTapChi['cap_truong']['he_so'];
            $soLuongTapChi['tong_quy_doi'] += $tapChi['cap_truong'] * $soLuongTapChi['cap_truong']['he_so'];

            $soLuongTapChi['ty_so_tap_chi'] = round($soLuongTapChi['tong_quy_doi'] / 173, 1);
        }
        return [
            'so_luong_tap_chi' => $soLuongTapChi
        ];
    }

    private function duLieuVietSach($university, $year)
    {
        $soLuongSach = [
            'chuyen_khao' => [
                'name' => 'Sách chuyên khảo',
                'he_so' => 2.0,
                'tong' => 0
            ],
            'giao_trinh' => [
                'name' => 'Sách giáo trình',
                'he_so' => 1.5,
                'tong' => 0
            ],
            'tham_khao' => [
                'name' => 'Sách tham khảo',
                'he_so' => 1,
                'tong' => 0
            ],
            'huong_dan' => [
                'name' => 'Sách hướng dẫn',
                'he_so' => 0.5,
                'tong' => 0
            ],
            'tong_quy_doi' => 0,
            'ty_so_sach' => 0
        ];
        for ($i = 0; $i < 5; $i++) {
            $sach = VietSach::getSoLuongSachByYear($university->id, $year - $i);
            if (is_null($sach)) {
                continue;
            }
//            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;
            $soLuongSach['chuyen_khao'][$year - $i] = $sach['sach_chuyen_khao'];
            $soLuongSach['chuyen_khao']['tong'] += $sach['sach_chuyen_khao'] * $soLuongSach['chuyen_khao']['he_so'];
            $soLuongSach['tong_quy_doi'] += $sach['sach_chuyen_khao'] * $soLuongSach['chuyen_khao']['he_so'];

            $soLuongSach['giao_trinh'][$year - $i] = $sach['sach_giao_trinh'];
            $soLuongSach['giao_trinh']['tong'] += $sach['sach_giao_trinh'] * $soLuongSach['giao_trinh']['he_so'];
            $soLuongSach['tong_quy_doi'] += $sach['sach_giao_trinh'] * $soLuongSach['giao_trinh']['he_so'];

            $soLuongSach['tham_khao'][$year - $i] = $sach['sach_tham_khao'];
            $soLuongSach['tham_khao']['tong'] += $sach['sach_tham_khao'] * $soLuongSach['tham_khao']['he_so'];
            $soLuongSach['tong_quy_doi'] += $sach['sach_tham_khao'] * $soLuongSach['tham_khao']['he_so'];

            $soLuongSach['huong_dan'][$year - $i] = $sach['sach_huong_dan'];
            $soLuongSach['huong_dan']['tong'] += $sach['sach_huong_dan'] * $soLuongSach['huong_dan']['he_so'];
            $soLuongSach['tong_quy_doi'] += $sach['sach_huong_dan'] * $soLuongSach['huong_dan']['he_so'];

            $soLuongSach['ty_so_sach'] = round($soLuongSach['tong_quy_doi'] / 173, 1);
        }
        return [
            'so_luong_sach' => $soLuongSach
        ];
    }

    private function duLieuNckh($university, $year)
    {
        $soLuongNckh = [
            'cap_nn' => [
                'name' => 'Đề tài cấp NN',
                'he_so' => 2.0,
                'tong' => 0
            ],
            'cap_bo' => [
                'name' => 'Đề tài cấp Bộ',
                'he_so' => 1.0,
                'tong' => 0
            ],
            'cap_truong' => [
                'name' => 'Đề tài cấp Trường',
                'he_so' => 0.5,
                'tong' => 0
            ],
            'tong_quy_doi' => 0,
            'ty_so_de_tai' => 0
        ];

        $doanhThu = [];

        for ($i = 0; $i < 5; $i++) {
            $nckh = NckhNghiemThu::getSoLuongNckhByYear($university->id, $year - $i);
            if (is_null($nckh)) {
                continue;
            }
            //            $giangVien = GiangVien::findByYear($university->id,$year-$i);
//            $soGiangVienCoHuu = $giangVien[0]->so_luong - $giangVien[0]->gv_thinh_giang;
//            $soGiangVienCoHuu = $soGiangVienCoHuu == 0 ? 1 : $soGiangVienCoHuu;
            $soLuongNckh['cap_nn'][$year - $i] = $nckh['cap_nn'];
            $soLuongNckh['cap_nn']['tong'] += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
            $soLuongNckh['cap_bo'][$year - $i] = $nckh['cap_bo'];
            $soLuongNckh['cap_bo']['tong'] += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
            $soLuongNckh['cap_truong'][$year - $i] = $nckh['cap_truong'];
            $soLuongNckh['cap_truong']['tong'] += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
            $soLuongNckh['ty_so_de_tai'] = round($soLuongNckh['tong_quy_doi'] / 173, 1);
            $doanhThu[$year - $i]['doanh_thu'] = $nckh['doanh_thu'];
            $doanhThu[$year - $i]['ti_le'] = round($nckh['doanh_thu'] / $nckh['kinh_phi'], 1);
            $doanhThu[$year - $i]['ti_so'] = round($nckh['doanh_thu'] / 173, 1); //so giao vien o dau
        }
        return [
            'so_luong_nckh' => $soLuongNckh,
            'doanh_thu' => $doanhThu
        ];
    }
}