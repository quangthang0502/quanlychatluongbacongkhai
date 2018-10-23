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
                                                <label for="thong_ke_nam" class="bmd-label-floating">Thống kê
                                                    năm</label>
                                                <input type="text" name="thong_ke_nam" id="thong_ke_nam"
                                                       class="form-control" value="{{$year}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
