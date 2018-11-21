@extends('admin.include.template')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{$title}}</h4>
                            <p class="card-category">{{$title}}</p>
                        </div>
                        <div class="card-body">
                            <div class="t-box">
                                <h3 class="title">
                                    <a href="{{route('admin.thongke.coSoVatChat', ['year'=>($year-1)])}}"
                                       class="staff t-left" href="">Xem năm {{$year-1}}</a>
                                    <span class="span-staff">Thống kê bộ năm {{$year}}</span>
                                    <a href="{{route('admin.thongke.coSoVatChat', ['year'=>($year+1)])}}"
                                       class="staff t-right" href="">Xem năm {{$year+1}}</a>
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead class="text-primary">
                                    <tr>
                                        <th colspan="1" rowspan="2">STT</th>
                                        <th colspan="1" rowspan="2">Tên trường</th>
                                        <th colspan="10" rowspan="1">Cơ sở vật chất</th>
                                    </tr>
                                    <tr>

                                        {{--Cơ sở vật chất--}}
                                        <th rowspan="1">Tổng</th>
                                        <th rowspan="1">Phòng học</th>
                                        <th rowspan="1">Phòng học / sinh viên</th>
                                        <th rowspan="1">Ký túc xá</th>
                                        <th rowspan="1">Ký túc xá / sinh viên</th>
                                        <th rowspan="1">Sách trong thư viên</th>
                                        <th rowspan="1">Số lượng máy tính</th>
                                        <th rowspan="1">Máy tính / sinh viên</th>
                                        <th rowspan="1">Tổng kinh phí</th>
                                        <th rowspan="1">Tổng thu học phí</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>


                                            {{--Cơ sở vật chất--}}
                                            <td>{{$item->co_so_vat_chat->tong_dien_tich}}</td>
                                            <td>{{$item->co_so_vat_chat->dien_tich_phong_hoc}}</td>
                                            <td>{{$item->co_so_vat_chat->ty_so_dien_tich_tren_sv}}</td>
                                            <td>{{$item->co_so_vat_chat->dien_tich_ktx}}</td>
                                            <td>{{$item->co_so_vat_chat->sinh_vien_ktx}}</td>
                                            <td>{{$item->co_so_vat_chat->so_sach_tv}}</td>
                                            <td>{{$item->co_so_vat_chat->so_may_tinh}}</td>
                                            <td>{{$item->co_so_vat_chat->ty_so_mt_tren_sv}}</td>
                                            <td>{{$item->co_so_vat_chat->tong_kinh_phi}}</td>
                                            <td>{{$item->co_so_vat_chat->tong_thu_hoc_phi}}</td>

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
@endsection