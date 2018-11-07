@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{$title . ' năm '. $year}}:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.infrastructure.postCreate', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tong_dien_tich" class="bmd-label-floating">Tổng diện
                                                    tích</label>
                                                <input type="text" name="tong_dien_tich" id="tong_dien_tich"
                                                       class="form-control" value="{{$coSoVatChat->tong_dien_tich}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="noi_lam_viec" class="bmd-label-floating">Diện tích nơi làm
                                                    việc</label>
                                                <input type="text" name="noi_lam_viec" id="noi_lam_viec"
                                                       class="form-control" value="{{$coSoVatChat->noi_lam_viec}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="noi_hoc" class="bmd-label-floating">Diện tích nơi
                                                    học</label>
                                                <input type="text" name="noi_hoc" id="noi_hoc"
                                                       class="form-control" value="{{$coSoVatChat->noi_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="noi_vui_choi" class="bmd-label-floating">Diện tích nơi
                                                    vui chơi</label>
                                                <input type="text" name="noi_vui_choi" id="noi_vui_choi"
                                                       class="form-control" value="{{$coSoVatChat->noi_vui_choi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dien_tich_phong_hoc" class="bmd-label-floating">Tổng diện
                                                    tích phòng học</label>
                                                <input type="text" name="dien_tich_phong_hoc" id="dien_tich_phong_hoc"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->dien_tich_phong_hoc}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="ty_so_dien_tich_tren_sv" class="bmd-label-floating">Tỷ số
                                                    trên sinh viên</label>
                                                <input type="text" name="ty_so_dien_tich_tren_sv"
                                                       id="ty_so_dien_tich_tren_sv"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->ty_so_dien_tich_tren_sv}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="so_sach_tv" class="bmd-label-floating">Số sách trong thư
                                                    viện</label>
                                                <input type="text" name="so_sach_tv"
                                                       id="so_sach_tv"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->so_sach_tv}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="sach_dao_tao" class="bmd-label-floating">Số đầu sách gắn với
                                                    các ngành đào tạo có cấp bằng của nhà trường</label>
                                                <input type="text" name="sach_dao_tao"
                                                       id="sach_dao_tao"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->sach_dao_tao}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="so_may_tinh_vp" class="bmd-label-floating"> Tổng số máy tính
                                                    dùng cho hệ thống văn phòng</label>
                                                <input type="text" name="so_may_tinh_vp"
                                                       id="so_may_tinh_vp"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->so_may_tinh_vp}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="so_may_tinh_sv" class="bmd-label-floating"> Tổng số máy tính
                                                    dùng cho sinh viên học tập</label>
                                                <input type="text" name="so_may_tinh_sv"
                                                       id="so_may_tinh_sv"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->so_may_tinh_sv}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="ty_so_mt_tren_sv" class="bmd-label-floating"> Tỷ số số máy
                                                    tính dùng cho sinh viên trên sinh viên chính quy</label>
                                                <input type="text" name="ty_so_mt_tren_sv"
                                                       id="ty_so_mt_tren_sv"
                                                       class="form-control"
                                                       value="{{$coSoVatChat->ty_so_mt_tren_sv}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tong_kinh_phi" class="bmd-label-floating"> Tổng kinh phí từ
                                                    các nguồn thu của trường</label>
                                                <input type="text" name="tong_kinh_phi"
                                                       id="tong_kinh_phi"
                                                       class="form-control"
                                                       value="{{$taiChinh->tong_kinh_phi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tong_thu_hoc_phi" class="bmd-label-floating"> Tổng thu học phí
                                                    (chỉ tính hệ chính quy)</label>
                                                <input type="text" name="tong_thu_hoc_phi"
                                                       id="tong_thu_hoc_phi"
                                                       class="form-control"
                                                       value="{{$taiChinh->tong_thu_hoc_phi}}">
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


        </div>
    </div>
@endsection
