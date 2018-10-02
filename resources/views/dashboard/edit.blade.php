@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{$title}}</h4>
                            <p class="card-category">Hãy cố gắng điền đủ thông tin</p>
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.dashboard.postEdit', $slug)}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="vi_ten" class="bmd-label-floating">Tên tiếng việt</label>
                                            <input type="text" name="vi_ten" id="vi_ten" class="form-control"
                                                   value="{{$university->vi_ten}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="en_ten" class="bmd-label-floating">Tên tiếng anh</label>
                                            <input type="text" name="en_ten" id="en_ten" class="form-control"
                                                   value="{{$university->en_ten}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vi_viet_tat" class="bmd-label-floating">Tên tiếng việt viết
                                                tắt</label>
                                            <input type="text" name="vi_viet_tat" id="vi_viet_tat" class="form-control"
                                                   value="{{$university->vi_viet_tat}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="en_viet_tat" class="bmd-label-floating">Tên tiếng anh viết
                                                tắt</label>
                                            <input type="text" name="en_viet_tat" id="en_viet_tat" class="form-control"
                                                   value="{{$university->en_viet_tat}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ten_cu" class="bmd-label-floating">Tên cũ</label>
                                            <textarea name="ten_cu" id="ten_cu" cols="30" class="form-control"
                                                      rows="8">{{$university->ten_cu}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="co_quan" class="bmd-label-floating">Cơ quan, Bộ chủ quản</label>
                                            <input type="text" name="co_quan" id="co_quan" class="form-control"
                                                   value="{{$university->co_quan}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="dia_chi" class="bmd-label-floating">Địa chỉ của trường</label>
                                            <input type="text" name="dia_chi" id="dia_chi" class="form-control"
                                                   value="{{$university->dia_chi}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dien_thoai" class="bmd-label-floating">Số điện thoại</label>
                                            <input type="text" name="dien_thoai" id="dien_thoai" class="form-control"
                                                   value="{{$university->dien_thoai}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fax" class="bmd-label-floating">Số fax</label>
                                            <input type="text" name="fax" id="fax" class="form-control"
                                                   value="{{$university->fax}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="website" class="bmd-label-floating">Địa chỉ website</label>
                                            <input type="text" name="website" id="website" class="form-control"
                                                   value="{{$university->website}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email" class="bmd-label-floating">Địa chỉ email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                   value="{{$university->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nam_thanh_lap" class="">Năm thành lập</label>
                                            <input type="date" name="nam_thanh_lap" id="nam_thanh_lap" class="form-control"
                                                   value="{{$university->nam_thanh_lap}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="thoi_gian_bat_dau_dao_tao" class="bmd-label-floating"> Thời gian bắt đầu đào tạo</label>
                                            <textarea name="thoi_gian_bat_dau_dao_tao" id="thoi_gian_bat_dau_dao_tao" cols="30" class="form-control"
                                                      rows="8">{{$university->thoi_gian_bat_dau_dao_tao}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="thoi_gian_cap_bang_khoa_dau" class="">Thời gian cấp bằng tốt nghiệp cho khoá Đại học thứ nhất:</label>
                                            <input type="date" name="thoi_gian_cap_bang_khoa_dau" id="thoi_gian_cap_bang_khoa_dau" class="form-control"
                                                   value="{{$university->thoi_gian_cap_bang_khoa_dau}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="loai_hinh_dao_tao" class="bmd-label-floating">Loại hình đào tạo</label>
                                            <input type="text" name="loai_hinh_dao_tao" id="loai_hinh_dao_tao" class="form-control"
                                                   value="{{$university->loai_hinh_dao_tao}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Cập nhập</button>
                                <a href="{{route('dashboard.university', $slug)}}" class="btn btn-warning pull-right">Quay
                                    lại</a>
                                <div class="clearfix"></div>
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
        // $(document).ready(function () {
        //     $('#ten_cu').summernote({
        //         placeholder: 'Tên cũ của trường',
        //     });
        // });
    </script>
@endsection