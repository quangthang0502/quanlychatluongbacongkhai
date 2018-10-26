@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> Tổng số học sinh đăng ký dự thi vào trường, số sinh viên trúng tuyển
                                và
                                nhập học</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.student.postCreate', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label style="font-weight: bold" for="trinh_do_dai_hoc"
                                                       class="bmd-label-floating">Trình độ : Đại học</label>
                                                <input type="hidden" name="trinh_do_dai_hoc" id="trinh_do_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->trinh_do}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_du_thi_dai_hoc" class="bmd-label-floating">Số lượng dự
                                                    thi đại học</label>
                                                <input type="text" name="sl_du_thi_dai_hoc" id="sl_du_thi_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->sl_du_thi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_trung_tuyen_dai_hoc" class="bmd-label-floating">Số lượng
                                                    trúng tuyển đại học</label>
                                                <input type="text" name="sl_trung_tuyen_dai_hoc"
                                                       id="sl_trung_tuyen_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->sl_trung_tuyen}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_nhap_hoc_dai_hoc" class="bmd-label-floating">Số lượng
                                                    người nhập học đại học</label>
                                                <input type="text" name="sl_nhap_hoc_dai_hoc" id="sl_nhap_hoc_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->sl_nhap_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_sv_quoc_te_dai_hoc" class="bmd-label-floating">Số lượng
                                                    sinh viên quốc tế nhập học </label>
                                                <input type="text" name="sl_sv_quoc_te_dai_hoc"
                                                       id="sl_sv_quoc_te_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->sl_sv_quoc_te}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_dau_vao_dai_hoc" class="bmd-label-floating">Điểm tuyển
                                                    đầu vào </label>
                                                <input type="text" name="diem_dau_vao_dai_hoc"
                                                       id="diem_dau_vao_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->diem_dau_vao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_tb_dai_hoc" class="bmd-label-floating">Điểm trung bình
                                                    của sinh viên được tuyển</label>
                                                <input type="text" name="diem_tb_dai_hoc" id="diem_tb_dai_hoc"
                                                       class="form-control" value="{{$sinhVienDaiHoc->diem_tb}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label style="font-weight: bold" for="trinh_do_dai_hoc"
                                                       class="bmd-label-floating">Trình độ : Liên thông</label>
                                                <input type="hidden" name="trinh_do_lien_thong" id="trinh_do_lien_thong"
                                                       class="form-control" value="{{$sinhVienLienThong->trinh_do}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_du_thi_lien_thong" class="bmd-label-floating">Số lượng dự
                                                    thi đại học</label>
                                                <input type="text" name="sl_du_thi_lien_thong" id="sl_du_thi_lien_thong"
                                                       class="form-control" value="{{$sinhVienLienThong->sl_du_thi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_trung_tuyen_lien_thong" class="bmd-label-floating">Số
                                                    lượng
                                                    trúng tuyển đại học</label>
                                                <input type="text" name="sl_trung_tuyen_lien_thong"
                                                       id="sl_trung_tuyen_lien_thong"
                                                       class="form-control"
                                                       value="{{$sinhVienLienThong->sl_trung_tuyen}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_nhap_hoc_lien_thong" class="bmd-label-floating">Số lượng
                                                    người nhập học đại học</label>
                                                <input type="text" name="sl_nhap_hoc_lien_thong"
                                                       id="sl_nhap_hoc_lien_thong"
                                                       class="form-control" value="{{$sinhVienLienThong->sl_nhap_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_sv_quoc_te_lien_thong" class="bmd-label-floating">Số
                                                    lượng
                                                    sinh viên quốc tế nhập học </label>
                                                <input type="text" name="sl_sv_quoc_te_lien_thong"
                                                       id="sl_sv_quoc_te_lien_thong"
                                                       class="form-control"
                                                       value="{{$sinhVienLienThong->sl_sv_quoc_te}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_dau_vao_lien_thong" class="bmd-label-floating">Điểm
                                                    tuyển
                                                    đầu vào </label>
                                                <input type="text" name="diem_dau_vao_lien_thong"
                                                       id="diem_dau_vao_lien_thong"
                                                       class="form-control"
                                                       value="{{$sinhVienLienThong->diem_dau_vao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_tb_lien_thong" class="bmd-label-floating">Điểm trung
                                                    bình của sinh viên được tuyển</label>
                                                <input type="text" name="diem_tb_lien_thong" id="diem_tb_lien_thong"
                                                       class="form-control" value="{{$sinhVienLienThong->diem_tb}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label style="font-weight: bold" for="trinh_do_sau_dai_hoc"
                                                       class="bmd-label-floating">Trình độ : Sau đại học</label>
                                                <input type="hidden" name="trinh_do_sau_dai_hoc"
                                                       id="trinh_do_sau_dai_hoc"
                                                       class="form-control" value="{{$sinhVienSauDaiHoc->trinh_do}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_du_thi_sau_dai_hoc" class="bmd-label-floating">Số lượng
                                                    dự
                                                    thi đại học</label>
                                                <input type="text" name="sl_du_thi_sau_dai_hoc"
                                                       id="sl_du_thi_sau_dai_hoc"
                                                       class="form-control" value="{{$sinhVienSauDaiHoc->sl_du_thi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_trung_tuyen_sau_dai_hoc" class="bmd-label-floating">Số
                                                    lượng
                                                    trúng tuyển đại học</label>
                                                <input type="text" name="sl_trung_tuyen_sau_dai_hoc"
                                                       id="sl_trung_tuyen_sau_dai_hoc"
                                                       class="form-control"
                                                       value="{{$sinhVienSauDaiHoc->sl_trung_tuyen}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_nhap_hoc_sau_dai_hoc" class="bmd-label-floating">Số lượng
                                                    người nhập học đại học</label>
                                                <input type="text" name="sl_nhap_hoc_sau_dai_hoc"
                                                       id="sl_nhap_hoc_sau_dai_hoc"
                                                       class="form-control" value="{{$sinhVienSauDaiHoc->sl_nhap_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sl_sv_quoc_te_sau_dai_hoc" class="bmd-label-floating">Số
                                                    lượng
                                                    sinh viên quốc tế nhập học </label>
                                                <input type="text" name="sl_sv_quoc_te_sau_dai_hoc"
                                                       id="sl_sv_quoc_te_sau_dai_hoc"
                                                       class="form-control"
                                                       value="{{$sinhVienSauDaiHoc->sl_sv_quoc_te}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_dau_vao_sau_dai_hoc" class="bmd-label-floating">Điểm
                                                    tuyển
                                                    đầu vào </label>
                                                <input type="text" name="diem_dau_vao_sau_dai_hoc"
                                                       id="diem_dau_vao_sau_dai_hoc"
                                                       class="form-control"
                                                       value="{{$sinhVienSauDaiHoc->diem_dau_vao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="diem_tb_sau_dai_hoc" class="bmd-label-floating">Điểm trung
                                                    bình của sinh viên được tuyển : <span
                                                            style="font-weight: bold">Đạt</span></label>
                                                <input type="hidden" name="diem_tb_sau_dai_hoc" id="diem_tb_sau_dai_hoc"
                                                       class="form-control" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">  Thống kê, phân loại số lượng người học nhập học trong 5 năm gần đây các
                                hệ chính quy và không chính quy: </h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.student.updateStudents', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="nghien_cuu_sinh" class="bmd-label-floating">Nghiên cứu sinh</label>
                                                <input type="text" name="nghien_cuu_sinh" id="nghien_cuu_sinh"
                                                       class="form-control" value="{{$phanLoaiSinhVien->nghien_cuu_sinh}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="hoc_vien_cao_hoc" class="bmd-label-floating">Học viên cao học </label>
                                                <input type="text" name="hoc_vien_cao_hoc" id="hoc_vien_cao_hoc"
                                                       class="form-control" value="{{$phanLoaiSinhVien->hoc_vien_cao_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dh_he_chinh_quy" class="bmd-label-floating">Học viên đại học chính quy </label>
                                                <input type="text" name="dh_he_chinh_quy" id="dh_he_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->dh_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dh_he_khong_chinh_quy" class="bmd-label-floating">Học viên đại học không chính quy </label>
                                                <input type="text" name="dh_he_khong_chinh_quy" id="dh_he_khong_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->dh_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cd_he_chinh_quy" class="bmd-label-floating">Học viên cao đẳng chính quy </label>
                                                <input type="text" name="cd_he_chinh_quy" id="cd_he_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->cd_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cd_he_khong_chinh_quy" class="bmd-label-floating">Học viên cao đẳng không chính quy </label>
                                                <input type="text" name="cd_he_khong_chinh_quy" id="cd_he_khong_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->cd_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tccn_he_chinh_quy" class="bmd-label-floating">Học viên TCCN chính quy </label>
                                                <input type="text" name="tccn_he_chinh_quy" id="tccn_he_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->tccn_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tccn_he_khong_chinh_quy" class="bmd-label-floating">Học viên TCCN không chính quy </label>
                                                <input type="text" name="tccn_he_khong_chinh_quy" id="tccn_he_khong_chinh_quy"
                                                       class="form-control" value="{{$phanLoaiSinhVien->tccn_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="khac" class="bmd-label-floating">Khác </label>
                                                <input type="text" name="khac" id="khac"
                                                       class="form-control" value="{{$phanLoaiSinhVien->khac}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
