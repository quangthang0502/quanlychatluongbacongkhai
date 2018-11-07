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
                                    <a href="{{route('admin.thongke.index', ['year'=>($year-1)])}}"
                                       class="staff t-left" href="">Xem năm {{$year-1}}</a>
                                    <span class="span-staff">Thống kê bộ năm {{$year}}</span>
                                    <a href="{{route('admin.thongke.index', ['year'=>($year+1)])}}"
                                       class="staff t-right" href="">Xem năm {{$year+1}}</a>
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead class="text-primary">
                                    <tr>
                                        <th colspan="1" rowspan="2">STT</th>
                                        <th colspan="1" rowspan="2">Tên trường</th>
                                        <th colspan="7" rowspan="1">Chuyên ngành đào tạo</th>
                                        <th colspan="8" rowspan="1">Cơ sở vật chất</th>
                                        <th colspan="4" rowspan="1">Giảng viên</th>
                                        <th colspan="4" rowspan="1">Sinh viên</th>
                                    </tr>
                                    <tr>
                                        {{--Chuyên ngành đào tạo--}}
                                        <th rowspan="1">Tiến sĩ</th>
                                        <th rowspan="1">Thạc sĩ</th>
                                        <th rowspan="1">Đại học</th>
                                        <th rowspan="1">Cao đẳng</th>
                                        <th rowspan="1">TCCN</th>
                                        <th rowspan="1">Nghề</th>
                                        <th rowspan="1">Khác</th>

                                        {{--Cơ sở vật chất--}}
                                        <th rowspan="1">Tổng</th>
                                        <th rowspan="1">Phòng học</th>
                                        <th rowspan="1">Phòng học / sinh viên</th>
                                        <th rowspan="1">Ký túc xá</th>
                                        <th rowspan="1">Ký túc xá / sinh viên</th>
                                        <th rowspan="1">Sách trong thư viên</th>
                                        <th rowspan="1">Số lượng máy tính</th>
                                        <th rowspan="1">Máy tính / sinh viên</th>

                                        {{--Giảng viên--}}
                                        <th>Giảng viên cơ hữu</th>
                                        <th>Giảng viên / cán bộ (%)</th>
                                        <th>Tiến sĩ / cán bộ (%)</th>
                                        <th>Thạc sĩ / cán bộ (%)</th>

                                        {{--Sinh viên --}}
                                        <th>Sinh viên (chính quy)</th>
                                        <th>Sinh viên quy đổi</th>
                                        <th>Sinh viên / Giảng viên</th>
                                        <th>Sinh viên tốt nghiệp</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>

                                            <td>{{$item->dao_tao->dao_tao_tien_sy}}</td>
                                            <td>{{$item->dao_tao->dao_tao_thac_sy}}</td>
                                            <td>{{$item->dao_tao->dao_tao_dai_hoc}}</td>
                                            <td>{{$item->dao_tao->dao_tao_cao_dang}}</td>
                                            <td>{{$item->dao_tao->dao_tao_tccn}}</td>
                                            <td>{{$item->dao_tao->dao_tao_nghe}}</td>
                                            <td>{{$item->dao_tao->dao_tao_khac}}</td>

                                            {{--Cơ sở vật chất--}}
                                            <td>{{$item->co_so_vat_chat->tong_dien_tich}}</td>
                                            <td>{{$item->co_so_vat_chat->dien_tich_phong_hoc}}</td>
                                            <td>{{$item->co_so_vat_chat->ty_so_dien_tich_tren_sv}}</td>
                                            <td>{{$item->co_so_vat_chat->dien_tich_ktx}}</td>
                                            <td>{{$item->co_so_vat_chat->sinh_vien_ktx}}</td>
                                            <td>{{$item->co_so_vat_chat->so_sach_tv}}</td>
                                            <td>{{$item->co_so_vat_chat->so_may_tinh}}</td>
                                            <td>{{$item->co_so_vat_chat->ty_so_mt_tren_sv}}</td>


                                            {{--Giảng viên--}}
                                            <td>{{$item->giang_vien->giang_vien_co_huu}}</td>
                                            <td>{{$item->giang_vien->giang_vien_can_bo}}</td>
                                            <td>{{$item->giang_vien->tien_si_can_bo}}</td>
                                            <td>{{$item->giang_vien->thac_si_can_bo}}</td>

                                            {{--Sinh viên --}}
                                            <td>{{$item->sinh_vien->sinh_vien_chinh_quy}}</td>
                                            <td>Sinh viên quy đổi</td>
                                            <td>{{($item->giang_vien->giang_vien_co_huu == 0)?
                                            '-': round(($item->sinh_vien->sinh_vien_chinh_quy*100)/$item->giang_vien->giang_vien_co_huu, 2)}}</td>
                                            <td>Sinh viên tốt nghiệp</td>
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