@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nghiên cứu khoa học và chuyển giao khoa học công nghệ</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.research.postCreate', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cap_nn" class="bmd-label-floating">Đề tài cấp nhà
                                                    nước</label>
                                                <input type="text" name="cap_nn" id="cap_nn"
                                                       class="form-control" value="{{$nckh->cap_nn}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cap_bo" class="bmd-label-floating">Đề tài cấp bộ</label>
                                                <input type="text" name="cap_bo" id="cap_bo"
                                                       class="form-control" value="{{$nckh->cap_bo}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cap_truong" class="bmd-label-floating">Đề tài cấp
                                                    trường</label>
                                                <input type="text" name="cap_truong" id="cap_truong"
                                                       class="form-control" value="{{$nckh->cap_truong}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="doanh_thu" class="bmd-label-floating">Doanh thu từ
                                                    NCKH và chuyển giao công nghệ (triệu VNĐ)</label>
                                                <input type="text" name="doanh_thu" id="doanh_thu"
                                                       class="form-control" value="{{$nckh->doanh_thu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="ti_so_doanh_thu" class="bmd-label-floating">Tỷ lệ doanh thu
                                                    từ NCKH và chuyển giao công nghệ so với tổng kinh phí đầu vào của
                                                    nhà trường (%) </label>
                                                <input type="text" name="ti_so_doanh_thu" id="ti_so_doanh_thu"
                                                       class="form-control" value="{{$nckh->ti_so_doanh_thu}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="ti_le_doanh_thu" class="bmd-label-floating">Tỷ số doanh thu
                                                    từ
                                                    NCKH và chuyển
                                                    giao công nghệ trên
                                                    cán bộ cơ hữu (triệu
                                                    VNĐ/ người)</label>
                                                <input type="text" name="ti_le_doanh_thu" id="ti_le_doanh_thu"
                                                       class="form-control" value="{{$nckh->ti_le_doanh_thu}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="width: 100%;text-align: right">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title">Số lượng sách của nhà trường được xuất bản</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.research.suaSach', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sach_chuyen_khao" class="bmd-label-floating">Sách chuyên
                                                    khảo</label>
                                                <input type="text" name="sach_chuyen_khao" id="sach_chuyen_khao"
                                                       class="form-control" value="{{$sach->sach_chuyen_khao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sach_giao_trinh" class="bmd-label-floating">Sách giáo
                                                    trình </label>
                                                <input type="text" name="sach_giao_trinh" id="sach_giao_trinh"
                                                       class="form-control" value="{{$sach->sach_giao_trinh}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sach_tham_khao" class="bmd-label-floating">Sách tham
                                                    khảo</label>
                                                <input type="text" name="sach_tham_khao" id="sach_tham_khao"
                                                       class="form-control" value="{{$sach->sach_tham_khao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sach_huong_dan" class="bmd-label-floating">Sách hướng
                                                    dẫn </label>
                                                <input type="text" name="sach_huong_dan" id="sach_huong_dan"
                                                       class="form-control" value="{{$sach->sach_tham_khao}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div style="width: 100%;text-align: right">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title"> Số lượng bài của các cán bộ cơ hữu của nhà trường được đăng tạp chí</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.research.tapChi', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="quoc_te" class="bmd-label-floating">Tạp chí KH quốc
                                                    tế
                                                </label>
                                                <input type="text" name="quoc_te" id="quoc_te"
                                                       class="form-control" value="{{$tapChi->quoc_te}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="trong_nuoc" class="bmd-label-floating">Tạp chí KH cấp
                                                    Ngành trong
                                                    nước  </label>
                                                <input type="text" name="trong_nuoc" id="trong_nuoc"
                                                       class="form-control" value="{{$tapChi->trong_nuoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cap_truong" class="bmd-label-floating">Tạp chí/tập san
                                                    của cấp trường</label>
                                                <input type="text" name="cap_truong" id="cap_truong"
                                                       class="form-control" value="{{$tapChi->cap_truong}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div style="width: 100%;text-align: right">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title"> Số lượng báo cáo khoa học do cán bộ cơ hữu của nhà trường báo cáo tại các
                                hội nghị, hội thảo, được đăng toàn văn trong tuyển tập công trình hay kỷ yếu</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.research.hoiThao', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="quoc_te" class="bmd-label-floating">Hội thảo quốc tế
                                                </label>
                                                <input type="text" name="quoc_te" id="quoc_te"
                                                       class="form-control" value="{{$hoiThao->quoc_te}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="trong_nuoc" class="bmd-label-floating">Hội thảo trong
                                                    nước </label>
                                                <input type="text" name="trong_nuoc" id="trong_nuoc"
                                                       class="form-control" value="{{$hoiThao->trong_nuoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cap_truong" class="bmd-label-floating">Hội thảo cấp
                                                    trường</label>
                                                <input type="text" name="cap_truong" id="cap_truong"
                                                       class="form-control" value="{{$hoiThao->cap_truong}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div style="width: 100%;text-align: right">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
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
                            <h4 class="card-title"> Số bằng phát minh, sáng chế được</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.research.bangSangche', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="noi_dung" class="bmd-label-floating">Số bằng phát minh, sáng chế được cấp
                                                    (ghi rõ nơi cấp, thời gian cấp, người được cấp)
                                                </label>
                                                <textarea name="noi_dung" id="noi_dung" class="form-control" rows="10">{{$sangChe->noi_dung}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div style="width: 100%;text-align: right">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


