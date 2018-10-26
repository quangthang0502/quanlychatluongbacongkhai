<?php

namespace App\Http\Controllers\University;


use App\Http\Controllers\Controller;
use App\Models\Canbo\GiangVien;
use App\Models\NghienCuuKhoaHoc\NckhNghiemThu;
use App\Models\University;

class Research extends Controller
{
    public function index($slug, $year)
    {
        $title = "Nghiên cứu khoa học và chuyển giao công nghệ";
        $university = University::findBySlug($slug);

        $soLuongNckh = $this->soLuongNckh($university, $year);

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
            $soLuongNckh['ty_so_de_tai'] = round($soLuongNckh['tong_quy_doi']/173,1);
            $doanhThu[$year-$i]['doanh_thu'] = $nckh['doanh_thu'];
            $doanhThu[$year-$i]['ti_le'] = round($nckh['doanh_thu']/$nckh['kinh_phi'],1);
            $doanhThu[$year-$i]['ti_so'] = round($nckh['doanh_thu']/173,1); //so giao vien o dau
        }

        return view('research.' . __FUNCTION__, compact('slug', 'title', 'year', 'soLuongNckh','doanhThu'));

    }

    private function soLuongNckh($university, $year)
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
            'tong_quy_doi' => 0
        ];
        for ($i = 0; $i < 5; $i++) {
            $nckh = NckhNghiemThu::getSoLuongNckhByYear($university->id, $year - $i);
            $soLuongNckh['cap_nn'][$year - $i] = $nckh['cap_nn'];
            $soLuongNckh['cap_nn']['tong'] += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_nn'] * $soLuongNckh['cap_nn']['he_so'];
            $soLuongNckh['cap_bo'][$year - $i] = $nckh['cap_bo'];
            $soLuongNckh['cap_bo']['tong'] += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_bo'] * $soLuongNckh['cap_bo']['he_so'];
            $soLuongNckh['cap_truong'][$year - $i] = $nckh['cap_truong'];
            $soLuongNckh['cap_truong']['tong'] += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
            $soLuongNckh['tong_quy_doi'] += $nckh['cap_truong'] * $soLuongNckh['cap_truong']['he_so'];
        }
        return $soLuongNckh;
    }
}