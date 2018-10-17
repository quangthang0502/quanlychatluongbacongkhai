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
                            @if(isset($phanLoaiCanBo))
                                <div class="mini-box">
                                    <h4 class="title">
                                        Thống kê số lượng cán bộ, giảng viên và nhân viên (gọi chung là cán bộ) của
                                        nhà trường
                                    </h4>
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
@endsection