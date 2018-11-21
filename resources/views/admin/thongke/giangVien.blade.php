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
                                    <a href="{{route('admin.thongke.giangVien', ['year'=>($year-1)])}}"
                                       class="staff t-left" href="">Xem năm {{$year-1}}</a>
                                    <span class="span-staff">Thống kê bộ năm {{$year}}</span>
                                    <a href="{{route('admin.thongke.giangVien', ['year'=>($year+1)])}}"
                                       class="staff t-right" href="">Xem năm {{$year+1}}</a>
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead class="text-primary">
                                    <tr>
                                        <th colspan="1" rowspan="2">STT</th>
                                        <th colspan="1" rowspan="2">Tên trường</th>
                                        <th colspan="4" rowspan="1">Giảng viên</th>
                                    </tr>
                                    <tr>


                                        {{--Giảng viên--}}
                                        <th>Giảng viên cơ hữu</th>
                                        <th>Giảng viên / cán bộ (%)</th>
                                        <th>Tiến sĩ / cán bộ (%)</th>
                                        <th>Thạc sĩ / cán bộ (%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>


                                            {{--Giảng viên--}}
                                            <td>{{$item->giang_vien->giang_vien_co_huu}}</td>
                                            <td>{{$item->giang_vien->giang_vien_can_bo}}</td>
                                            <td>{{$item->giang_vien->tien_si_can_bo}}</td>
                                            <td>{{$item->giang_vien->thac_si_can_bo}}</td>


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