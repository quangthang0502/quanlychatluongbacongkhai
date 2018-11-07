@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.infrastructure.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.infrastructure.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Thống kê năm {{$year}}</span>
                            <a href="{{route('university.infrastructure.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
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

    </div>
@endsection