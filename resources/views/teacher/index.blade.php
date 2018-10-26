@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
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
                                                        <td>{{heSoQuyDoi($item->trinh_do, $universityType)}}</td>
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
                                                        <td>{{round(($item->so_luong*100)/$thongKeBang18->so_luong,2)}}</td>
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
                </div>
            </div>
        </div>

    </div>
@endsection