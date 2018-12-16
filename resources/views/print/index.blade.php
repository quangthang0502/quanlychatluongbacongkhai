<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
    <style>
        @media print {
            table.table-bordered {
                border: 1px solid #e1e1e1;
                width: 100%;
            }
        }
    </style>
</head>
<body class="">
<h1 style="text-align: center">Thông tin năm {{$year}}
    <button type="button" class="btn btn-info" onclick="printxxx(this)">In ngay</button>
</h1>

<div class="wrapper " id="cjghsdfkjhg">
    <div class="container">
        <div class="content">
            <div class="container-fluid">
                <div class="t-box">
                    <h3 class="title">Thông tin chung của nhà trường</h3>
                    <ul>
                        <li class="univer-name">
                            <div class="title">Tên trường</div>
                            <div class="content">
                                <p><b>Tên tiếng Việt :</b> {{$university->vi_ten}}</p>
                                <p><b>Tên tiếng Anh :</b> {{$university->en_ten}}</p>
                            </div>
                        </li>
                        <li>
                            <p><b>Viết tắt tiếng Việt :</b> {{$university->vi_viet_tat}}</p>
                            <p><b>Viết tắt tiếng Anh :</b> {{$university->en_viet_tat}}</p>
                        </li>
                        <li>
                            <p><b>Tên cũ :</b></p>
                            <p>{{$university->ten_cu}}</p>
                        </li>
                        <li>
                            <p><b>Cơ quan, Bộ chủ quản :</b> {{$university->co_quan}}</p>
                        </li>
                        <li>
                            <p><b>Địa chỉ của trường :</b> {{$university->dia_chi}}</p>
                        </li>
                        <li>
                            <div class="title">Liên hệ</div>
                            <div class="content">
                                <p><b>Số điện thoại :</b> {{$university->dien_thoai}}</p>
                                <p><b>Số Fax :</b> {{$university->fax}}</p>
                                <p><b>Email :</b> {{$university->email}}</p>
                                <p><b>Website :</b> {{$university->website}}</p>
                            </div>
                        </li>
                        <li>
                            <p><b> Năm thành lập trường
                                    :</b> {{date('d/m/Y', strtotime($university->nam_thanh_lap))}}</p>
                        </li>
                        <li>
                            <p><b> Thời gian bắt đầu đào tạo :</b> {{$university->thoi_gian_bat_dau_dao_tao}}</p>
                        </li>
                        <li>
                            <p><b>Thời gian cấp bằng tốt nghiệp cho khoá Đại học thứ nhất
                                    :</b> {{date('d/m/Y', strtotime($university->thoi_gian_cap_bang_khoa_dau))}}</p>
                        </li>
                        <li>
                            <p><b>Loại hình đào tạo :</b> {{$university->loai_hinh_dao_tao}}</p>
                        </li>
                    </ul>
                </div>
                <div class="t-box">
                    <h3 class="title"> Giới thiệu khái quát về nhà trường</h3>
                    <div>{!! $gioiThieu->noi_dung !!}</div>
                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                    </h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <tr>
                                <th>Bộ phận</th>
                                <th>Họ tên</th>
                                <th>Năm sinh</th>
                                <th>Học vị chức danh</th>
                            </tr>
                            </thead>
                            <tbody id="list-staffs">
                            @foreach($dataCanBo as $item)
                                <tr>
                                    <td>
                                        <span style="display: block">{{$item->bo_phan}}</span>
                                        <span style="display: block">{{$item->nhom_bo_phan}}</span>
                                    </td>
                                    <td>
                                        {{$item->ho_va_ten}}
                                    </td>
                                    <td>{{$item->nam_sinh}}</td>
                                    <td>
                                        {{$item->hoc_vi.', '. $item->chuc_vu}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Thông tin đào tạo năm {{$year}}</span>
                    </h3>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title"> Tổng số các khoa đào tạo:
                                {{$daoTao->tong_so_cac_khoa}}</h4>
                        </div>
                        <div class="mini-box">
                            <h4 class="title">Các ngành/ chuyên ngành đào tạo (còn gọi là chương trình đào
                                tạo): </h4>
                            <ul class="count">
                                <li>Số lượng chuyên ngành đào tạo tiến sĩ: {{$chuyenNganhDaoTao->dao_tao_tien_sy}}</li>
                                <li>Số lượng chuyên ngành đào tạo thạc sĩ: {{$chuyenNganhDaoTao->dao_tao_thac_sy}}</li>
                                <li>Số lượng ngành đào tạo đại học: {{$chuyenNganhDaoTao->dao_tao_dai_hoc}}</li>
                                <li>Số lượng ngành đào tạo cao đẳng: {{$chuyenNganhDaoTao->dao_tao_cao_dang}}</li>
                                <li>Số lượng ngành đào tạo TCCN: {{$chuyenNganhDaoTao->dao_tao_tccn}}</li>
                                <li>Số lượng ngành đào tạo nghề: {{$chuyenNganhDaoTao->dao_tao_nghe}}</li>
                                <li>Số lượng ngành (chuyên ngành) đào tạo khác (đề nghị nêu
                                    rõ): {{$chuyenNganhDaoTao->dao_tao_khac}}</li>
                            </ul>
                        </div>
                        <div class="mini-box">
                            <h4 class="title">Các loại hình đào tạo của nhà trường (đánh dấu x vào các ô tương
                                ứng) </h4>
                            <ul class="type">
                                <li>
                                    <div class="content">Chính quy:
                                        <b>{{($loaiHinhDaoTao->chinh_quy == 1)? 'Có' : "Không"}}</b></div>
                                </li>
                                <li>
                                    <div class="content">Không chính quy:
                                        <b>{{($loaiHinhDaoTao->khong_chinh_quy == 1)? 'Có' : "Không"}}</b></div>
                                </li>
                                <li>
                                    <div class="content">Từ xa: <b>{{($loaiHinhDaoTao->tu_xa == 1)? 'Có' : "Không"}}</b>
                                    </div>
                                </li>
                                <li>
                                    <div class="content">Liên kết đào tạo với nước ngoài:
                                        <b>{{($loaiHinhDaoTao->lien_ket_nuoc_ngoai == 1)? 'Có' : "Không"}}</b></div>
                                </li>
                                <li>
                                    <div class="content">Liên kết đào tạo trong nước:
                                        <b>{{($loaiHinhDaoTao->lien_ket_trong_nuoc == 1)? 'Có' : "Không"}}</b></div>
                                </li>
                                <li>
                                    <div class="content">Các loại hình đào tạo khác (nếu có, ghi rõ từng loại
                                        hình): <b>{{$loaiHinhDaoTao->khac}}</b>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Thông tin giảng viên {{$year}}</span>
                    </h3>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Thống kê số lượng cán bộ, giảng viên và nhân viên (gọi chung là cán bộ) của
                                nhà trường
                            </h4>
                            @if(isset($phanLoaiCanBo))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th>STT</th>
                                                <th>Phân loại</th>
                                                <th>Nam</th>
                                                <th>Nữ</th>
                                                <th>Tổng số</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>I</td>
                                                <td>
                                                    <p style="font-weight: bold">Cán bộ cơ hữu 1</p>
                                                    <p>Trong đó:</p>
                                                </td>
                                                <td>{{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->hop_dong_nam}}</td>
                                                <td>{{$phanLoaiCanBo->bien_che_nu + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                <td>
                                                    {{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
                                                     $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>I.1</td>
                                                <td>
                                                    <p>Cán bộ trong biên chế </p>
                                                </td>
                                                <td>{{$phanLoaiCanBo->bien_che_nam}}</td>
                                                <td>{{$phanLoaiCanBo->bien_che_nu}}</td>
                                                <td>{{$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu}}</td>
                                            </tr>
                                            <tr>
                                                <td>I.2</td>
                                                <td>
                                                    <p>Cán bộ hợp đồng dài hạn (từ 1 năm trở lên) và
                                                        hợp đồng không xác định thời hạn </p>
                                                </td>
                                                <td>{{$phanLoaiCanBo->hop_dong_nam}}</td>
                                                <td>{{$phanLoaiCanBo->hop_dong_nu}}</td>
                                                <td>{{$phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}</td>
                                            </tr>
                                            <tr>
                                                <td>II</td>
                                                <td>
                                                    <p style="font-weight: bold">Các cán bộ khác</p>
                                                    <p>Hợp đồng ngắn hạn (dưới 1 năm, bao gồm cả
                                                        giảng viên thỉnh giảng)</p>
                                                </td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nam}}</td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nu}}</td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold">Tổng</td>
                                                <td>

                                                </td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->bien_che_nam
                                                    + $phanLoaiCanBo->hop_dong_nam}}</td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nu+$phanLoaiCanBo->bien_che_nu
                                                    + $phanLoaiCanBo->hop_dong_nu}}</td>
                                                <td>{{$phanLoaiCanBo->cb_khac_nam + $phanLoaiCanBo->cb_khac_nu
                                                    +$phanLoaiCanBo->bien_che_nam + $phanLoaiCanBo->bien_che_nu +
                                                         $phanLoaiCanBo->hop_dong_nam + $phanLoaiCanBo->hop_dong_nu}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Thống kê, phân loại giảng viên (chỉ tính những giảng viên trực tiếp giảng
                                dạy trong 5 năm gần đây):
                            </h4>
                            @if(count( $giangVien ) != 0)
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Trình độ, học vị, chức danh</th>
                                                <th rowspan="2">Số lượng GV</th>
                                                <th rowspan="1" colspan="3">Giảng viên cơ hữu</th>
                                                <th rowspan="2">GV thỉnh giảng</th>
                                                <th rowspan="2">GV quốc tế</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">GV trong biên chế trực tiếp giảng dạy</th>
                                                <th rowspan="1">GV hợp đồng dài hạn trực tiếp giảng dạy</th>
                                                <th rowspan="1">GV kiêm nhiệm là cán bộ quản lý</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @for($i = 1; $i < 9; $i++)
                                                    <td>({{$i}})</td>
                                                @endfor
                                            </tr>
                                            @foreach($giangVien as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{getNameTeacher($item->trinh_do)}}</td>
                                                    <td>{{$item->so_luong}}</td>
                                                    <td>{{$item->gv_bien_che}}</td>
                                                    <td>{{$item->gv_hop_dong}}</td>
                                                    <td>{{$item->gv_quan_ly}}</td>
                                                    <td>{{$item->gv_thinh_giang}}</td>
                                                    <td>{{$item->gv_quoc_te}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td>Tổng số</td>
                                                <td>{{$thongKeBang18->so_luong}}</td>
                                                <td>{{$thongKeBang18->gv_bien_che}}</td>
                                                <td>{{$thongKeBang18->gv_hop_dong}}</td>
                                                <td>{{$thongKeBang18->gv_quan_ly}}</td>
                                                <td>{{$thongKeBang18->gv_thinh_giang}}</td>
                                                <td>{{$thongKeBang18->gv_quoc_te}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div style="margin-bottom: 30px">
                                            <p style="font-weight: bold">
                                                Tổng số giảng viên cơ hữu= Cột (3) - cột (7)
                                                = {{$thongKeBang18->so_luong - $thongKeBang18->gv_thinh_giang }}
                                            </p>
                                            <p style="font-weight: bold">
                                                Tỷ lệ giảng viên cơ hữu trên tổng số cán bộ cơ
                                                hữu: {{round($tiLeGiangVienCoHuu,2)}}%
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Quy đổi số lượng giảng viên của nhà trường: -
                                Số liệu bảng 19 được lấy từ bảng 18 nhân với hệ số quy đổi.
                            </h4>
                            @if(count( $giangVien ) != 0)
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Trình độ, học vị, chức danh</th>
                                                <th rowspan="2">Hệ số quy đổi</th>
                                                <th rowspan="2">Số lượng GV</th>
                                                <th rowspan="1" colspan="3">Giảng viên cơ hữu</th>
                                                <th rowspan="2">GV thỉnh giảng</th>
                                                <th rowspan="2">GV quốc tế</th>
                                                <th rowspan="2">GV quy đổi</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">GV trong biên chế trực tiếp giảng dạy</th>
                                                <th rowspan="1">GV hợp đồng dài hạn trực tiếp giảng dạy</th>
                                                <th rowspan="1">GV kiêm nhiệm là cán bộ quản lý</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @for($i = 1; $i < 11; $i++)
                                                    <td>({{$i}})</td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Hệ số quy đổi</td>
                                                <td></td>
                                                <td></td>
                                                <td>1.0</td>
                                                <td>1.0</td>
                                                <td>0.3</td>
                                                <td>0.2</td>
                                                <td>0.2</td>
                                                <td></td>
                                            </tr>
                                            @foreach($giangVien as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{getNameTeacher($item->trinh_do)}}</td>
                                                    <td>{{heSoQuyDoi($item->trinh_do, $university->type)}}</td>
                                                    <td>{{$item->so_luong}}</td>
                                                    <td>{{$item->gv_bien_che}}</td>
                                                    <td>{{$item->gv_hop_dong}}</td>
                                                    <td>{{$item->gv_quan_ly}}</td>
                                                    <td>{{$item->gv_thinh_giang}}</td>
                                                    <td>{{$item->gv_quoc_te}}</td>
                                                    <td>{{$gvQuyDoi[$item->trinh_do]}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td>Tổng số</td>
                                                <td></td>
                                                <td>{{$thongKeBang18->so_luong}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$tongQuyDoi}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Thống kê, phân loại giảng viên cơ hữu theo trình độ, giới tính và độ tuổi (số
                                người):
                            </h4>
                            @if(count( $giangVien ) != 0)
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Trình độ, học vị</th>
                                                <th rowspan="2">Số lượng</th>
                                                <th rowspan="2">Tỷ lệ (%)</th>
                                                <th rowspan="1" colspan="2">Phân loại theo giới tính</th>
                                                <th rowspan="1" colspan="5">Phân loại theo tuổi (người)</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Nam</th>
                                                <th rowspan="1">Nữ</th>
                                                <th rowspan="1">< 30</th>
                                                <th rowspan="1">30-40</th>
                                                <th rowspan="1">41-50</th>
                                                <th rowspan="1">51-60</th>
                                                <th rowspan="1">> 60</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($giangVien as $item)
												<?php $doTuoi = json_decode( $item->do_tuoi ); ?>
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{getNameTeacher($item->trinh_do)}}</td>
                                                    <td>{{$item->so_luong}}</td>
                                                    <td>
                                                        @if($item->so_luong != 0)
                                                            {{round(($item->so_luong*100)/$thongKeBang18->so_luong,2)}}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>{{$item->giao_vien_nam}}</td>
                                                    <td>{{$item->so_luong - $item->giao_vien_nam}}</td>
                                                    <td>{{$doTuoi->lv_1}}</td>
                                                    <td>{{$doTuoi->lv_2}}</td>
                                                    <td>{{$doTuoi->lv_3}}</td>
                                                    <td>{{$doTuoi->lv_4}}</td>
                                                    <td>{{$doTuoi->lv_5}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td>Tổng số</td>
                                                <td>{{$thongKeBang18->so_luong}}</td>
                                                <td>100</td>
                                                <td>{{$thongKeDoTuoi['giao_vien_nam']}}</td>
                                                <td>{{$thongKeDoTuoi['giao_vien_nu']}}</td>
                                                <td>{{$thongKeDoTuoi['lv_1']}}</td>
                                                <td>{{$thongKeDoTuoi['lv_2']}}</td>
                                                <td>{{$thongKeDoTuoi['lv_3']}}</td>
                                                <td>{{$thongKeDoTuoi['lv_4']}}</td>
                                                <td>{{$thongKeDoTuoi['lv_5']}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Thống kê, phân loại giảng viên cơ hữu theo mức độ thường xuyên sử dụng
                                ngoại ngữ và tin học cho công tác giảng dạy và nghiên cứu:
                            </h4>
                            @if(!is_null($trinhDo))
								<?php
								$tiengAnh = json_decode( $trinhDo->trinh_do_ngoai_ngu );
								$tinHoc = json_decode( $trinhDo->tin_hoc );
								?>
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Tần suất sử dụng</th>
                                                <th rowspan="1" colspan="2">Tỷ lệ (%) giảng viên cơ hữu sử dụng
                                                    ngoại ngữ và tin học
                                                </th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Ngoại ngữ</th>
                                                <th rowspan="1">Tin học</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Luôn sử dụng (trên 80% thời gian của công việc)</td>
                                                <td>{{$tiengAnh->lv_5}}</td>
                                                <td>{{$tinHoc->lv_5}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Thường sử dụng (trên 60-80% thời gian của công việc)</td>
                                                <td>{{$tiengAnh->lv_4}}</td>
                                                <td>{{$tinHoc->lv_4}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Đôi khi sử dụng (trên 40-60% thời gian của công việc)</td>
                                                <td>{{$tiengAnh->lv_3}}</td>
                                                <td>{{$tinHoc->lv_3}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Ít khi sử dụng (trên 20-40% thời gian của công việc)</td>
                                                <td>{{$tiengAnh->lv_2}}</td>
                                                <td>{{$tinHoc->lv_2}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Hiếm khi sử dụng hoặc không sử dụng (0-20% thời gian của công
                                                    việc)
                                                </td>
                                                <td>{{$tiengAnh->lv_1}}</td>
                                                <td>{{$tinHoc->lv_1}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold">Tổng</td>
                                                <td>{{$tiengAnh->lv_5+$tiengAnh->lv_4+$tiengAnh->lv_3+$tiengAnh->lv_2+$tiengAnh->lv_1}}</td>
                                                <td>{{$tinHoc->lv_5+$tinHoc->lv_4+$tinHoc->lv_3+$tinHoc->lv_2+$tinHoc->lv_1}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                    </h3>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Thống kê số lượng cán bộ, giảng viên và nhân viên (gọi chung là cán bộ) của
                                nhà trường
                            </h4>
                            @if(isset($sinhVienDaiHoc) && isset($sinhVienLienThong) && isset($sinhVienSauDaiHoc))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th>Năm học</th>
                                                <th>Số thí sinh dự thi (người)</th>
                                                <th>Số trúng tuyển (người)</th>
                                                <th>Tỷ lệ cạnh tranh</th>
                                                <th>Số nhập học thực tế (người)</th>
                                                <th>Điểm tuyển đầu vào (thang điểm 30)</th>
                                                <th>Điểm trung bình của sinh viên được tuyển</th>
                                                <th>Số lượng sinh viên quốc tế nhập học (người)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Đại học</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach($sinhVienDaiHoc as $item)
                                                <tr>
                                                    <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                    <td>{{($item->sl_du_thi != null)?$item->sl_du_thi:'-'}}</td>
                                                    <td>{{($item->sl_trung_tuyen != null)?$item->sl_trung_tuyen:'-'}}</td>
                                                    <td>-</td>
                                                    <td>{{($item->sl_nhap_hoc != null)?$item->sl_nhap_hoc:'-'}}</td>
                                                    <td>{{($item->diem_dau_vao != null)?round($item->diem_dau_vao,2):'-'}}</td>
                                                    <td>{{($item->diem_tb != null)?round($item->diem_tb,2):'-'}}</td>
                                                    <td>{{($item->sl_sv_quoc_te != null)?$item->sl_sv_quoc_te:'-'}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Liên thông</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach($sinhVienLienThong as $item)
                                                <tr>
                                                    <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                    <td>{{($item->sl_du_thi != null)?$item->sl_du_thi:'-'}}</td>
                                                    <td>{{($item->sl_trung_tuyen != null)?$item->sl_trung_tuyen:'-'}}</td>
                                                    <td>-</td>
                                                    <td>{{($item->sl_nhap_hoc != null)?$item->sl_nhap_hoc:'-'}}</td>
                                                    <td>{{($item->diem_dau_vao != null)?round($item->diem_dau_vao,2):'-'}}</td>
                                                    <td>{{($item->diem_tb != null)?round($item->diem_tb,2):'-'}}</td>
                                                    <td>{{($item->sl_sv_quoc_te != null)?$item->sl_sv_quoc_te:'-'}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Sau đại học</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach($sinhVienSauDaiHoc as $item)
                                                <tr>
                                                    <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                    <td>{{($item->sl_du_thi != null)?$item->sl_du_thi:'-'}}</td>
                                                    <td>{{($item->sl_trung_tuyen != null)?$item->sl_trung_tuyen:'-'}}</td>
                                                    <td>-</td>
                                                    <td>{{($item->sl_nhap_hoc != null)?$item->sl_nhap_hoc:'-'}}</td>
                                                    <td>{{($item->diem_dau_vao != null)?round($item->diem_dau_vao,2):'-'}}</td>
                                                    <td>{{($item->diem_tb == 1)?'Đạt':'Không đạt'}}</td>
                                                    <td>{{($item->sl_sv_quoc_te != null)?$item->sl_sv_quoc_te:'-'}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                21. Thống kê, phân loại số lượng người học nhập học trong 5 năm gần đây các
                                hệ chính quy và không chính quy:
                            </h4>
                            @if(isset($phanLoaiSinhVien))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="2">1. Nghiên cứu sinh</th>
                                                <th rowspan="2">2. Học viên cao học</th>
                                                <th rowspan="1" colspan="2">3. Sinh viên đại học</th>
                                                <th rowspan="1" colspan="2">4. Sinh viên cao đẳng</th>
                                                <th rowspan="1" colspan="2">5. Học sinh TCCN</th>
                                                <th rowspan="2">Khác</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($phanLoaiSinhVien as $item)
                                                <tr>
                                                    <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                    <td>{{($item->nghien_cuu_sinh != 0)?$item->nghien_cuu_sinh :''}}</td>
                                                    <td>{{($item->hoc_vien_cao_hoc != 0)?$item->hoc_vien_cao_hoc :''}}</td>
                                                    <td>{{($item->dh_he_chinh_quy != 0)?$item->dh_he_chinh_quy :''}}</td>
                                                    <td>{{($item->dh_he_khong_chinh_quy != 0)?$item->dh_he_khong_chinh_quy :''}}</td>
                                                    <td>{{($item->cd_he_chinh_quy != 0)?$item->cd_he_chinh_quy :''}}</td>
                                                    <td>{{($item->cd_he_khong_chinh_quy != 0)?$item->cd_he_khong_chinh_quy :''}}</td>
                                                    <td>{{($item->tccn_he_chinh_quy != 0)?$item->tccn_he_chinh_quy :''}}</td>
                                                    <td>{{($item->tccn_he_khong_chinh_quy != 0)?$item->tccn_he_khong_chinh_quy :''}}</td>
                                                    <td>{{($item->khac != 0)?$item->khac:''}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Tình trạng sinh viên tốt nghiệp {{$year}}</span>
                    </h3>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">Thống kê số lượng người tốt nghiệp trong 5 năm gần đây:</h4>
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="text-align: center">
                                        <thead class="text-primary">
                                        <tr>
                                            <th rowspan="2">Các tiêu chí</th>
                                            <th rowspan="2">1. Nghiên cứu sinh bảo vệ thành
                                                công luận án tiến sĩ
                                            </th>
                                            <th rowspan="2">2. Học viên tốt nghiệp cao học</th>
                                            <th rowspan="1" colspan="2">3. Sinh viên tốt nghiệp đại học</th>
                                            <th rowspan="1" colspan="2">4. Sinh viên tốt nghiệp cao đẳng</th>
                                            <th rowspan="1" colspan="2">5. Sinh viên tốt nghiệp trung cấp</th>
                                            <th rowspan="2">Khác</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="1">Hệ chính quy</th>
                                            <th rowspan="1">Hệ không chính quy</th>
                                            <th rowspan="1">Hệ chính quy</th>
                                            <th rowspan="1">Hệ không chính quy</th>
                                            <th rowspan="1">Hệ chính quy</th>
                                            <th rowspan="1">Hệ không chính quy</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($totNghiep as $item)
                                            <tr>
                                                <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                <td>{{($item->nghien_cuu_sinh != 0)?$item->nghien_cuu_sinh :'-'}}</td>
                                                <td>{{($item->hoc_vien_cao_hoc != 0)?$item->hoc_vien_cao_hoc :'-'}}</td>
                                                <td>{{($item->dh_he_chinh_quy != 0)?$item->dh_he_chinh_quy :'-'}}</td>
                                                <td>{{($item->dh_he_khong_chinh_quy != 0)?$item->dh_he_khong_chinh_quy :'-'}}</td>
                                                <td>{{($item->cd_he_chinh_quy != 0)?$item->cd_he_chinh_quy :'-'}}</td>
                                                <td>{{($item->cd_he_khong_chinh_quy != 0)?$item->cd_he_khong_chinh_quy :'-'}}</td>
                                                <td>{{($item->tccn_he_chinh_quy != 0)?$item->tccn_he_chinh_quy :'-'}}</td>
                                                <td>{{($item->tccn_he_khong_chinh_quy != 0)?$item->tccn_he_khong_chinh_quy :'-'}}</td>
                                                <td>{{($item->khac != 0)?$item->khac:'-'}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Tình trạng tốt nghiệp của sinh viên hệ chính quy
                            </h4>
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-primary">
                                        <tr style="text-align: center">
                                            <th rowspan="2">Các tiêu chí</th>
                                            <th rowspan="1" colspan="5">Năm tốt nghiệp</th>
                                        </tr>
                                        <tr style="text-align: center">
                                            @foreach($sinhVienChinhQuy->year as $item)
                                                <th rowspan="1">{{$item}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                            @foreach($sinhVienChinhQuy->so_luong as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                            @foreach($sinhVienChinhQuy->ty_le_tot_nghiep as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>
                                                3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của nhà
                                                trường: <br>
                                                A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                            </td>
                                            <td rowspan="2" colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                những kiến thức và kỹ năng cần thiết
                                                cho công việc theo ngành tốt nghiệp
                                                (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_3_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và kỹ
                                                năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_3_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                được những kiến thức và kỹ năng cần
                                                thiết cho công việc theo ngành tốt
                                                nghiệp
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_3_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4. Sinh viên có việc làm trong năm
                                                đầu tiên sau khi tốt nghiệp:<br>
                                                A. Nhà trường không điều tra về vấn
                                                đề này → chuyển xuống câu 5<br>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                ngành đào tạo (%)<br>
                                                - Sau 12 tháng tốt nghiệp
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_4_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                ngành đào tạo (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_4_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4.3 Thu nhập bình quân/tháng của sinh
                                                viên có việc làm
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_4_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5. Đánh giá của nhà tuyển dụng về
                                                sinh viên tốt nghiệp có việc làm đúng
                                                ngành đào tạo:<br>
                                                A. Nhà trường không điều tra về vấn
                                                đề này → chuyển xuống kết thúc bảng
                                                này<br>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                của công việc, có thể sử dụng được
                                                ngay (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_5_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                cầu của công việc, nhưng phải đào tạo
                                                thêm (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_5_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                lại hoặc đào tạo bổ sung ít nhất 6
                                                tháng (%)
                                            </td>
                                            @foreach($sinhVienChinhQuy->cau_5_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Tình trạng tốt nghiệp của sinh viên hệ cao đẳng hệ chính quy
                            </h4>
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-primary">
                                        <tr style="text-align: center">
                                            <th rowspan="2">Các tiêu chí</th>
                                            <th rowspan="1" colspan="5">Năm tốt nghiệp</th>
                                        </tr>
                                        <tr style="text-align: center">
                                            @foreach($sinhVienCaoDang->year as $item)
                                                <th rowspan="1">{{$item}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                            @foreach($sinhVienCaoDang->so_luong as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                            @foreach($sinhVienCaoDang->ty_le_tot_nghiep as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>
                                                3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của nhà
                                                trường: <br>
                                                A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                            </td>
                                            <td rowspan="2" colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                những kiến thức và kỹ năng cần thiết
                                                cho công việc theo ngành tốt nghiệp
                                                (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_3_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và kỹ
                                                năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_3_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                được những kiến thức và kỹ năng cần
                                                thiết cho công việc theo ngành tốt
                                                nghiệp
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_3_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4. Sinh viên có việc làm trong năm
                                                đầu tiên sau khi tốt nghiệp:<br>
                                                A. Nhà trường không điều tra về vấn
                                                đề này → chuyển xuống câu 5<br>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                ngành đào tạo (%)<br>
                                                - Sau 12 tháng tốt nghiệp
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_4_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                ngành đào tạo (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_4_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>4.3 Thu nhập bình quân/tháng của sinh
                                                viên có việc làm
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_4_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5. Đánh giá của nhà tuyển dụng về
                                                sinh viên tốt nghiệp có việc làm đúng
                                                ngành đào tạo:<br>
                                                A. Nhà trường không điều tra về vấn
                                                đề này → chuyển xuống kết thúc bảng
                                                này<br>
                                                B. Nhà trường có điều tra về vấn đề
                                                này → điền các thông tin dưới đây
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                của công việc, có thể sử dụng được
                                                ngay (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_5_1 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                cầu của công việc, nhưng phải đào tạo
                                                thêm (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_5_2 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                lại hoặc đào tạo bổ sung ít nhất 6
                                                tháng (%)
                                            </td>
                                            @foreach($sinhVienCaoDang->cau_5_3 as $item)
                                                <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="t-box">
                    <h3 class="title">
                        <a href="{{route('university.research.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                           class="staff t-left" href="">Xem năm {{$year-1}}</a>
                        <span class="span-staff">Thống kê trong 5 năm </span>
                        <a href="{{route('university.research.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                           class="staff t-right" href="">Xem năm {{$year+1}}</a>
                    </h3>
                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Số lượng đề tài nghiên cứu khoa học và chuyển giao khoa học công nghệ
                                của nhà trường được nghiệm thu trong 5 năm gần đây
                            </h4>
                            @if(isset($soLuongNckh))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Phân loại đề tài</th>
                                                <th rowspan="2">Hệ số</th>
                                                <th rowspan="1" colspan="6">Số lượng</th>

                                            </tr>
                                            <tr>
                                                <th rowspan="1">{{$year-4}}</th>
                                                <th rowspan="1">{{$year-3}}</th>
                                                <th rowspan="1">{{$year-2}}</th>
                                                <th rowspan="1">{{$year-1}}</th>
                                                <th rowspan="1">{{$year}}</th>
                                                <th rowspan="1">Tổng(đã quy đổi)</th>

                                            </tr>

                                            </thead>
                                            <tbody>
											<?php $key = [ 'cap_nn', 'cap_bo', 'cap_truong' ] ?>
                                            @for($i = 0; $i < 3; $i++)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$soLuongNckh[$key[$i]]['name']}}</td>
                                                    <td>{{$soLuongNckh[$key[$i]]['he_so']}}</td>
                                                    <td>{{isset($soLuongNckh[$key[$i]][$year-4]) ? $soLuongNckh[$key[$i]][$year - 4] : 0}}</td>
                                                    <td>{{isset($soLuongNckh[$key[$i]][$year-3]) ? $soLuongNckh[$key[$i]][$year - 3] : 0}}</td>
                                                    <td>{{isset($soLuongNckh[$key[$i]][$year-2]) ? $soLuongNckh[$key[$i]][$year - 2] : 0}}</td>
                                                    <td>{{isset($soLuongNckh[$key[$i]][$year-1]) ? $soLuongNckh[$key[$i]][$year - 1] : 0}}</td>
                                                    <td>{{isset($soLuongNckh[$key[$i]][$year]) ? $soLuongNckh[$key[$i]][$year] : 0}}</td>
                                                    <td>{{$soLuongNckh[$key[$i]]['tong']}}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <p style="font-weight: bold">
                                            <strong> Tổng số đề tài quy
                                                đổi: {{$soLuongNckh['tong_quy_doi']}} </strong>
                                            <br>
                                            <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                nghệ (quy đổi)
                                                trên cán bộ cơ hữu: ???? </strong>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="thong-tin-dao-tao" style="margin-top: 40px">
                        <div class="mini-box">
                            <h4 class="title">
                                Doanh thu từ nghiên cứu khoa học và chuyển giao công nghệ của nhà trường
                                trong 5 năm gần đây
                            </h4>
                            @if(isset($doanhThu))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Năm</th>
                                                <th rowspan="2">Doanh thu từ NCKH và chuyển giao công nghệ (triệu
                                                    VNĐ)
                                                </th>
                                                <th rowspan="2">Tỷ lệ doanh thu từ NCKH và chuyển giao công nghệ so
                                                    với tổng kinh phí đầu vào của nhà trường(%)
                                                </th>
                                                <th rowspan="2">Tỷ số doanh thu từ NCKH và chuyển giao công nghệ
                                                    trên cán bộ cơ hữu (triệu VND/người)
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @for($i = 0; $i < 5; $i++)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$year - $i}}</td>
                                                    <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['doanh_thu'] : 0 }}</td>
                                                    <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['ti_le'] : 0 }}</td>
                                                    <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['ti_so'] : 0 }}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="thong-tin-dao-tao" style="margin-top: 40px">
                        <div class="mini-box">
                            <h4 class="title">
                                Số lượng sách của nhà trường được xuất bản trong 5 năm gần đây
                            </h4>
                            @if(isset($soLuongSach))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Phân loại sách</th>
                                                <th rowspan="2">Hệ số</th>
                                                <th rowspan="1" colspan="6">Số lượng</th>

                                            </tr>
                                            <tr>
                                                <th rowspan="1">{{$year-4}}</th>
                                                <th rowspan="1">{{$year-3}}</th>
                                                <th rowspan="1">{{$year-2}}</th>
                                                <th rowspan="1">{{$year-1}}</th>
                                                <th rowspan="1">{{$year}}</th>
                                                <th rowspan="1">Tổng(đã quy đổi)</th>

                                            </tr>

                                            </thead>
                                            <tbody>
											<?php $key = [ 'chuyen_khao', 'giao_trinh', 'tham_khao', 'huong_dan' ] ?>
                                            @for($i = 0; $i < 4; $i++)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$soLuongSach[$key[$i]]['name']}}</td>
                                                    <td>{{$soLuongSach[$key[$i]]['he_so']}}</td>
                                                    <td>{{isset($soLuongSach[$key[$i]][$year-4]) ? $soLuongSach[$key[$i]][$year - 4 ]: 0}}</td>
                                                    <td>{{isset($soLuongSach[$key[$i]][$year-3]) ? $soLuongSach[$key[$i]][$year - 3 ]: 0}}</td>
                                                    <td>{{isset($soLuongSach[$key[$i]][$year-2]) ? $soLuongSach[$key[$i]][$year - 2 ]: 0}}</td>
                                                    <td>{{isset($soLuongSach[$key[$i]][$year-1]) ? $soLuongSach[$key[$i]][$year - 1 ]: 0}}</td>
                                                    <td>{{isset($soLuongSach[$key[$i]][$year]) ? $soLuongSach[$key[$i]][$year] : 0}}</td>
                                                    <td>{{$soLuongSach[$key[$i]]['tong']}}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <p style="font-weight: bold">
                                            <strong> Tổng số đề tài quy
                                                đổi: {{$soLuongSach['tong_quy_doi']}} </strong>
                                            <br>
                                            <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                nghệ (quy đổi)
                                                trên cán bộ cơ hữu: {{$soLuongSach['ty_so_sach']}} </strong>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="thong-tin-dao-tao" style="margin-top: 40px">
                        <div class="mini-box">
                            <h4 class="title">
                                Số lượng bài của các cán bộ cơ hữu của nhà trường được đăng tạp chí trong
                                5 năm gần đây
                            </h4>
                            @if(isset($soLuongTapChi))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Phân loại sách</th>
                                                <th rowspan="2">Hệ số</th>
                                                <th rowspan="1" colspan="6">Số lượng</th>

                                            </tr>
                                            <tr>
                                                <th rowspan="1">{{$year-4}}</th>
                                                <th rowspan="1">{{$year-3}}</th>
                                                <th rowspan="1">{{$year-2}}</th>
                                                <th rowspan="1">{{$year-1}}</th>
                                                <th rowspan="1">{{$year}}</th>
                                                <th rowspan="1">Tổng(đã quy đổi)</th>

                                            </tr>

                                            </thead>
                                            <tbody>
											<?php $key = [ 'quoc_te', 'trong_nuoc', 'cap_truong' ] ?>
                                            @for($i = 0; $i < 3; $i++)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$soLuongTapChi[$key[$i]]['name']}}</td>
                                                    <td>{{$soLuongTapChi[$key[$i]]['he_so']}}</td>
                                                    <td>{{isset($soLuongTapChi[$key[$i]][$year-4]) ? $soLuongTapChi[$key[$i]][$year-4] : 0 }}</td>
                                                    <td>{{isset($soLuongTapChi[$key[$i]][$year-3]) ? $soLuongTapChi[$key[$i]][$year-3] : 0 }}</td>
                                                    <td>{{isset($soLuongTapChi[$key[$i]][$year-2]) ? $soLuongTapChi[$key[$i]][$year-2] : 0 }}</td>
                                                    <td>{{isset($soLuongTapChi[$key[$i]][$year-1]) ? $soLuongTapChi[$key[$i]][$year-1] : 0 }}</td>
                                                    <td>{{isset($soLuongTapChi[$key[$i]][$year]) ? $soLuongTapChi[$key[$i]][$year] : 0 }}</td>
                                                    <td>{{$soLuongTapChi[$key[$i]]['tong']}}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <p style="font-weight: bold">
                                            <strong> Tổng số đề tài quy
                                                đổi: {{$soLuongTapChi['tong_quy_doi']}} </strong>
                                            <br>
                                            <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                nghệ (quy đổi)
                                                trên cán bộ cơ hữu: {{$soLuongTapChi['ty_so_tap_chi']}} </strong>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="thong-tin-dao-tao" style="margin-top: 40px">
                        <div class="mini-box">
                            <h4 class="title">
                                Số lượng báo cáo khoa học do cán bộ cơ hữu của nhà trường báo cáo tại các
                                hội nghị, hội thảo, được đăng toàn văn trong tuyển tập công trình hay kỷ yếu
                                trong 5 năm gần đây
                            </h4>
                            @if(isset($soLuongHoiThao))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Phân loại sách</th>
                                                <th rowspan="2">Hệ số</th>
                                                <th rowspan="1" colspan="6">Số lượng</th>

                                            </tr>
                                            <tr>
                                                <th rowspan="1">{{$year-4}}</th>
                                                <th rowspan="1">{{$year-3}}</th>
                                                <th rowspan="1">{{$year-2}}</th>
                                                <th rowspan="1">{{$year-1}}</th>
                                                <th rowspan="1">{{$year}}</th>
                                                <th rowspan="1">Tổng(đã quy đổi)</th>

                                            </tr>

                                            </thead>
                                            <tbody>
											<?php $key = [ 'quoc_te', 'trong_nuoc', 'cap_truong' ] ?>
                                            @for($i = 0; $i < 3; $i++)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$soLuongHoiThao[$key[$i]]['name']}}</td>
                                                    <td>{{$soLuongHoiThao[$key[$i]]['he_so']}}</td>
                                                    <td>{{isset($soLuongHoiThao[$key[$i]][$year-4]) ? $soLuongHoiThao[$key[$i]][$year-4] : 0 }}</td>
                                                    <td>{{isset($soLuongHoiThao[$key[$i]][$year-3]) ? $soLuongHoiThao[$key[$i]][$year-3] : 0 }}</td>
                                                    <td>{{isset($soLuongHoiThao[$key[$i]][$year-2]) ? $soLuongHoiThao[$key[$i]][$year-2] : 0 }}</td>
                                                    <td>{{isset($soLuongHoiThao[$key[$i]][$year-1]) ? $soLuongHoiThao[$key[$i]][$year-1] : 0 }}</td>
                                                    <td>{{isset($soLuongHoiThao[$key[$i]][$year]) ? $soLuongHoiThao[$key[$i]][$year] : 0 }}</td>
                                                    <td>{{$soLuongHoiThao[$key[$i]]['tong']}}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <p style="font-weight: bold">
                                            <strong> Tổng số đề tài quy
                                                đổi: {{$soLuongHoiThao['tong_quy_doi']}} </strong>
                                            <br>
                                            <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                nghệ (quy đổi)
                                                trên cán bộ cơ hữu: {{$soLuongHoiThao['ty_so_bai_bao']}} </strong>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="thong-tin-dao-tao" style="margin-top: 40px">
                        <div class="mini-box">
                            <h4 class="title">
                                Số bằng phát minh, sáng chế được cấp trong 5 năm gần đây
                            </h4>
                            @if(isset($sangChe))
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">Năm học</th>
                                                <th rowspan="2">Số bằng phát minh, sáng chế được cấp
                                                    (ghi rõ nơi cấp, thời gian cấp, người được cấp)
                                                </th>

                                            </tr>

                                            </thead>
                                            <tbody>
                                            @for($i = 4; $i >= 0; $i--)
                                                <tr>
                                                    <td>{{$year - $i - 1}}-{{$year - $i}}</td>
                                                    <td>{{isset($sangChe[$year-$i]) ? $sangChe[$year - $i]['noi_dung'] : "-" }}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @else
                                <div style="text-align: center">
                                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                       class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
                <div class="t-box">
                    <h3 class="title">
                        <span class="span-staff">Thống kê năm {{$year}}</span>
                    </h3>
                    <ul>
                        <li>Tổng diện tích đất sử dụng của trường (tính bằng m2): <span
                                    style="font-weight: bold">{{$coSoVatChat->tong_dien_tich}}</span> m2
                        </li>
                        <li>Diện tích sử dụng cho các hạng mục sau (tính bằng m2):
                            <ul>
                                <li style="list-style-type: circle !important;">Nơi làm việc:
                                    <span style="font-weight: bold">{{$coSoVatChat->noi_lam_viec}}m2</span></li>
                                <li style="list-style-type: circle !important;">Nơi học:
                                    <span style="font-weight: bold">{{$coSoVatChat->noi_lam_viec}}m2</span></li>
                                <li style="list-style-type: circle !important;"> Nơi vui chơi giải trí:
                                    <span style="font-weight: bold">{{$coSoVatChat->noi_vui_choi}}</span></li>
                            </ul>
                        </li>
                        <li>Diện tích phòng học (tính bằng m2)
                            <ul style="list-style-type: circle !important;">
                                <li style="list-style-type: circle !important;">Tổng diện tích phòng học
                                    <span style="font-weight: bold">{{$coSoVatChat->dien_tich_phong_hoc}}m2</span>
                                </li>
                                <li style="list-style-type: circle !important;">Tỷ số diện tích phòng học trên sinh
                                    viên chính quy:
                                    <span style="font-weight: bold">{{$coSoVatChat->ty_so_dien_tich_tren_sv}}
                                        m2/1sv</span></li>
                            </ul>
                        </li>
                        <li>
                            <p>Tổng số đầu sách trong thư viện của nhà trường
                                <span style="font-weight: bold">{{$coSoVatChat->so_sach_tv}}</span> cuốn
                            </p>
                            <p>
                                Tổng số đầu sách gắn với các ngành đào tạo có cấp bằng của nhà trường:
                                <span style="font-weight: bold">{{$coSoVatChat->sach_dao_tao}}</span> cuốn.
                            </p>
                        </li>
                        <li>Tổng số máy tính của trường:
                            <ul>
                                <li style="list-style-type: circle !important;">
                                    Dùng cho hệ thống văn phòng:
                                    <span style="font-weight: bold">{{$coSoVatChat->so_may_tinh_vp}}</span>
                                </li>
                                <li style="list-style-type: circle !important;">
                                    Dùng cho sinh viên học tập:
                                    <span style="font-weight: bold">{{$coSoVatChat->so_may_tinh_sv}}</span>
                                </li>
                                <li style="list-style-type: circle !important;">
                                    Tỷ số số máy tính dùng cho sinh viên trên sinh viên chính quy:
                                    <span style="font-weight: bold">{{$coSoVatChat->ty_so_mt_tren_sv}} %</span>
                                    (SV học luân phiên theo kỳ)
                                </li>
                            </ul>
                        </li>
                        <li>
                            Tổng kinh phí từ các nguồn thu của trường trong 5 năm gần đây (Gồm cả
                            ngân sách nhà nước cấp các hoạt động và nguồn thu ngoài ngân sách):
                            <ul>
                                @foreach($taiChinh as $item)
                                    <li style="list-style-type: circle !important;">
                                        Năm {{$item->nam_thong_ke}}:
                                        <span style="font-weight: bold">{{$item->tong_kinh_phi}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            Tổng thu học phí (chỉ tính hệ chính quy) trong 5 năm gần đây:
                            <ul>
                                @foreach($taiChinh as $item)
                                    <li style="list-style-type: circle !important;">
                                        Năm {{$item->nam_thong_ke}}:
                                        <span style="font-weight: bold">{{$item->tong_kinh_phi}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                    <div class="thong-tin-dao-tao">
                        <div class="mini-box">
                            <h4 class="title">
                                Nhu cầu kí túc xá
                            </h4>

                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="text-primary">
                                        <tr>
                                            <th rowspan="2">Năm</th>
                                            <th rowspan="1" colspan="4">Các tiêu chí</th>
                                        </tr>
                                        <tr>
                                            <th>Tổng diện tích phòng ở (m2)</th>
                                            <th> Số lượng sinh viên có nhu cầu về
                                                phòng ở (trong và ngoài ký túc xá)
                                            </th>
                                            <th>Số lượng sinh viên được ở trong
                                                ký túc xá
                                            </th>
                                            <th>Tỷ số diện tích trên đầu sinh viên
                                                ở trong ký túc xá, m2/người
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kiTucXa as $item)
                                            <tr>
                                                <td>{{($item->nam_thong_ke - 1).'-'.$item->nam_thong_ke}}</td>
                                                <td>{{$item->tong_dien_tich}}</td>
                                                <td>{{$item->nhu_cau}}</td>
                                                <td>{{$item->duoc_o}}</td>
                                                <td>{{($item->duoc_o == 0)? '-' : (round($item->tong_dien_tich/$item->duoc_o,2))}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 100px;"></div>
</div>

@include('template.script')
<script>
    function printxxx(obj) {
        $(obj).css('display', 'none');
        w = window.open();
        w.document.write($('head').html());
        w.document.write($('#cjghsdfkjhg').html());
        w.print();
        w.close();
        // window.print();
    }
</script>
</body>
</html>