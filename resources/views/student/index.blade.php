@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.student.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.student.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                            <a href="{{route('university.student.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
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
                                                        <td>{{($item->khac != 0)?$item->khac com:''}}</td>
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
                </div>
            </div>
        </div>

    </div>
@endsection