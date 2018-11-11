@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> Thống kê số lượng người tốt nghiệp trong năm {{$year}}: </h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.sv.postCreate', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="nghien_cuu_sinh" class="bmd-label-floating">1. Nghiên cứu
                                                    sinh bảo vệ thành công luận án tiến sĩ</label>
                                                <input type="text" name="nghien_cuu_sinh" id="nghien_cuu_sinh"
                                                       class="form-control" value="{{$totNghiep->nghien_cuu_sinh}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="hoc_vien_cao_hoc" class="bmd-label-floating">2. Học viên tốt
                                                    nghiệp cao học </label>
                                                <input type="text" name="hoc_vien_cao_hoc" id="hoc_vien_cao_hoc"
                                                       class="form-control" value="{{$totNghiep->hoc_vien_cao_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dh_he_chinh_quy" class="bmd-label-floating"> Sinh viên tốt
                                                    nghiệp đại học chính quy </label>
                                                <input type="text" name="dh_he_chinh_quy" id="dh_he_chinh_quy"
                                                       class="form-control" value="{{$totNghiep->dh_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dh_he_khong_chinh_quy" class="bmd-label-floating"> Sinh viên
                                                    tốt nghiệp đại học không chính quy </label>
                                                <input type="text" name="dh_he_khong_chinh_quy"
                                                       id="dh_he_khong_chinh_quy"
                                                       class="form-control"
                                                       value="{{$totNghiep->dh_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cd_he_chinh_quy" class="bmd-label-floating">Sinh viên tốt
                                                    nghiệp cao đẳng chính quy </label>
                                                <input type="text" name="cd_he_chinh_quy" id="cd_he_chinh_quy"
                                                       class="form-control" value="{{$totNghiep->cd_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cd_he_khong_chinh_quy" class="bmd-label-floating">Sinh viên
                                                    tốt nghiệp cao đẳng không chính quy </label>
                                                <input type="text" name="cd_he_khong_chinh_quy"
                                                       id="cd_he_khong_chinh_quy"
                                                       class="form-control"
                                                       value="{{$totNghiep->cd_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tccn_he_chinh_quy" class="bmd-label-floating">Sinh viên tốt
                                                    nghiệp TCCN chính quy </label>
                                                <input type="text" name="tccn_he_chinh_quy" id="tccn_he_chinh_quy"
                                                       class="form-control" value="{{$totNghiep->tccn_he_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tccn_he_khong_chinh_quy" class="bmd-label-floating">Sinh
                                                    viên tốt nghiệp TCCN không chính quy </label>
                                                <input type="text" name="tccn_he_khong_chinh_quy"
                                                       id="tccn_he_khong_chinh_quy"
                                                       class="form-control"
                                                       value="{{$totNghiep->tccn_he_khong_chinh_quy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="khac" class="bmd-label-floating">Khác </label>
                                                <input type="text" name="khac" id="khac"
                                                       class="form-control" value="{{$totNghiep->khac}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title"> Tình trạng tốt nghiệp của sinh viên hệ chính quy:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.sv.svDaiHoc', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-primary">
                                            <tr style="text-align: center">
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="1" colspan="1">Năm tốt nghiệp</th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th rowspan="1">{{$year}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                                <td>
                                                    <input title="so_luong_sv_tot_nghiep" class="form-control"
                                                           type="number" name="so_luong_sv_tot_nghiep"
                                                           value="{{$sinhVienChinhQuy->so_luong_sv_tot_nghiep}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                                <td>
                                                    <input title="ty_le_tot_nghiep" class="form-control"
                                                           type="number" name="ty_le_tot_nghiep"
                                                           value="{{$sinhVienChinhQuy->ty_le_tot_nghiep}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của
                                                    nhà
                                                    trường: <br>
                                                    A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                                </td>
                                                <td rowspan="2" colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                    những kiến thức và kỹ năng cần thiết
                                                    cho công việc theo ngành tốt nghiệp
                                                    (%)
                                                </td>
                                                <td>
                                                    <input title="cau_3_1" class="form-control"
                                                           type="number" name="cau_3_1"
                                                           value="{{$sinhVienChinhQuy->cau_3_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và
                                                    kỹ
                                                    năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                                </td>
                                                <td>
                                                    <input title="cau_3_2" class="form-control"
                                                           type="number" name="cau_3_2"
                                                           value="{{$sinhVienChinhQuy->cau_3_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                    được những kiến thức và kỹ năng cần
                                                    thiết cho công việc theo ngành tốt
                                                    nghiệp
                                                </td>
                                                <td>
                                                    <input title="cau_3_3" class="form-control"
                                                           type="number" name="cau_3_3"
                                                           value="{{$sinhVienChinhQuy->cau_3_3}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4. Sinh viên có việc làm trong năm
                                                    đầu tiên sau khi tốt nghiệp:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống câu 5<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                    ngành đào tạo (%)<br>
                                                    - Sau 12 tháng tốt nghiệp
                                                </td>
                                                <td>
                                                    <input title="cau_4_1" class="form-control"
                                                           type="number" name="cau_4_1"
                                                           value="{{$sinhVienChinhQuy->cau_4_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                    ngành đào tạo (%)
                                                </td>
                                                <td>
                                                    <input title="cau_4_2" class="form-control"
                                                           type="number" name="cau_4_2"
                                                           value="{{$sinhVienChinhQuy->cau_4_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.3 Thu nhập bình quân/tháng của sinh
                                                    viên có việc làm
                                                </td>
                                                <td>
                                                    <input title="cau_4_3" class="form-control"
                                                           type="number" name="cau_4_3"
                                                           value="{{$sinhVienChinhQuy->cau_4_3}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5. Đánh giá của nhà tuyển dụng về
                                                    sinh viên tốt nghiệp có việc làm đúng
                                                    ngành đào tạo:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống kết thúc bảng
                                                    này<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                    của công việc, có thể sử dụng được
                                                    ngay (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_1" class="form-control"
                                                           type="number" name="cau_5_1"
                                                           value="{{$sinhVienChinhQuy->cau_5_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                    cầu của công việc, nhưng phải đào tạo
                                                    thêm (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_2" class="form-control"
                                                           type="number" name="cau_5_2"
                                                           value="{{$sinhVienChinhQuy->cau_5_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                    lại hoặc đào tạo bổ sung ít nhất 6
                                                    tháng (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_3" class="form-control"
                                                           type="number" name="cau_5_3"
                                                           value="{{$sinhVienChinhQuy->cau_5_3}}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title"> Tình trạng tốt nghiệp của sinh viên cao đẳng hệ chính quy:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.sv.svCaoDang', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-primary">
                                            <tr style="text-align: center">
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="1" colspan="1">Năm tốt nghiệp</th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th rowspan="1">{{$year}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                                <td>
                                                    <input title="so_luong_sv_tot_nghiep" class="form-control"
                                                           type="number" name="so_luong_sv_tot_nghiep"
                                                           value="{{$sinhVienCaoDang->so_luong_sv_tot_nghiep}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                                <td>
                                                    <input title="ty_le_tot_nghiep" class="form-control"
                                                           type="number" name="ty_le_tot_nghiep"
                                                           value="{{$sinhVienCaoDang->ty_le_tot_nghiep}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của
                                                    nhà
                                                    trường: <br>
                                                    A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                                </td>
                                                <td rowspan="2" colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                    những kiến thức và kỹ năng cần thiết
                                                    cho công việc theo ngành tốt nghiệp
                                                    (%)
                                                </td>
                                                <td>
                                                    <input title="cau_3_1" class="form-control"
                                                           type="number" name="cau_3_1"
                                                           value="{{$sinhVienCaoDang->cau_3_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và
                                                    kỹ
                                                    năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                                </td>
                                                <td>
                                                    <input title="cau_3_2" class="form-control"
                                                           type="number" name="cau_3_2"
                                                           value="{{$sinhVienCaoDang->cau_3_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                    được những kiến thức và kỹ năng cần
                                                    thiết cho công việc theo ngành tốt
                                                    nghiệp
                                                </td>
                                                <td>
                                                    <input title="cau_3_3" class="form-control"
                                                           type="number" name="cau_3_3"
                                                           value="{{$sinhVienCaoDang->cau_3_3}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4. Sinh viên có việc làm trong năm
                                                    đầu tiên sau khi tốt nghiệp:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống câu 5<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                    ngành đào tạo (%)<br>
                                                    - Sau 12 tháng tốt nghiệp
                                                </td>
                                                <td>
                                                    <input title="cau_4_1" class="form-control"
                                                           type="number" name="cau_4_1"
                                                           value="{{$sinhVienCaoDang->cau_4_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                    ngành đào tạo (%)
                                                </td>
                                                <td>
                                                    <input title="cau_4_2" class="form-control"
                                                           type="number" name="cau_4_2"
                                                           value="{{$sinhVienCaoDang->cau_4_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.3 Thu nhập bình quân/tháng của sinh
                                                    viên có việc làm
                                                </td>
                                                <td>
                                                    <input title="cau_4_3" class="form-control"
                                                           type="number" name="cau_4_3"
                                                           value="{{$sinhVienCaoDang->cau_4_3}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5. Đánh giá của nhà tuyển dụng về
                                                    sinh viên tốt nghiệp có việc làm đúng
                                                    ngành đào tạo:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống kết thúc bảng
                                                    này<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                    của công việc, có thể sử dụng được
                                                    ngay (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_1" class="form-control"
                                                           type="number" name="cau_5_1"
                                                           value="{{$sinhVienCaoDang->cau_5_1}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                    cầu của công việc, nhưng phải đào tạo
                                                    thêm (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_2" class="form-control"
                                                           type="number" name="cau_5_2"
                                                           value="{{$sinhVienCaoDang->cau_5_2}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                    lại hoặc đào tạo bổ sung ít nhất 6
                                                    tháng (%)
                                                </td>
                                                <td>
                                                    <input title="cau_5_3" class="form-control"
                                                           type="number" name="cau_5_3"
                                                           value="{{$sinhVienCaoDang->cau_5_3}}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
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
