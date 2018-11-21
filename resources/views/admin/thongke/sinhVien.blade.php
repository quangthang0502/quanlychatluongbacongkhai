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
                                    <a href="{{route('admin.thongke.sinhVien', ['year'=>($year-1)])}}"
                                       class="staff t-left" href="">Xem năm {{$year-1}}</a>
                                    <span class="span-staff">Thống kê bộ năm {{$year}}</span>
                                    <a href="{{route('admin.thongke.sinhVien', ['year'=>($year+1)])}}"
                                       class="staff t-right" href="">Xem năm {{$year+1}}</a>
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead class="text-primary">
                                    <tr>
                                        <th colspan="1" rowspan="2">STT</th>
                                        <th colspan="1" rowspan="2">Tên trường</th>
                                        <th colspan="11" rowspan="1">Sinh viên</th>
                                    </tr>
                                    <tr>

                                        {{--Sinh viên --}}
                                        <th>Sinh viên (chính quy)</th>
                                        <th>Sinh viên quy đổi</th>
                                        <th>Sinh viên / Giảng viên</th>
                                        <th>Sinh viên tốt nghiệp</th>
                                        <th>Tỷ lệ sinh viên trả lời đã học được những kiến thức và kỹ năng cần thiết cho
                                            công việc theo ngành tốt nghiệp (%)
                                        </th>
                                        <th>Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và kỹ năng cần thiết
                                            cho
                                            công việc theo ngành tốt nghiệp (%)
                                        </th>
                                        <th>Tỷ lệ sinh viên có việc làm đúng ngành đào tạo (%)</th>
                                        <th>Tỷ lệ sinh viên có việc làm trái ngành đào tạo (%)</th>
                                        <th>Thu nhập bình quân/tháng của sinh viên có việc làm (triệu VNĐ)</th>
                                        <th>Tỷ lệ sinh viên đáp ứng yêu cầu của công việc, có thể sử dụng được ngay
                                            (%)
                                        </th>
                                        <th>Tỷ lệ sinh viên cơ bản đáp ứng yêu cầu của công việc, nhưng phải đào tạo
                                            thêm (%)
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>

                                            {{--Sinh viên --}}
                                            <td>{{$item->sinh_vien->sinh_vien_chinh_quy}}</td>
                                            <td>Sinh viên quy đổi</td>
                                            <td>{{($item->giang_vien->giang_vien_co_huu == 0)?
                                            '-': round(($item->sinh_vien->sinh_vien_chinh_quy*100)/$item->giang_vien->giang_vien_co_huu, 2)}}</td>
                                            <td>{{$item->sinh_vien->sinh_vien_tot_nghiep}}</td>
                                            <td>{{$item->sinh_vien->hoc_100_kien_thuc}}</td>
                                            <td>{{$item->sinh_vien->hoc_50_kien_thuc}}</td>
                                            <td>{{$item->sinh_vien->dung_nganh}}</td>
                                            <td>{{$item->sinh_vien->trai_nganh}}</td>
                                            <td>{{$item->sinh_vien->thu_nhap}}</td>
                                            <td>{{$item->sinh_vien->dap_ung_nha_truong}}</td>
                                            <td>{{$item->sinh_vien->khong_dap_ung_nha_truong}}</td>
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