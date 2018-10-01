@extends('admin.include.template')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Tạo tài khoản mới</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin người dùng</p>
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('admin.user.create')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Tên</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="bmd-label-floating">Email đăng nhập</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="type" value="2"
                                                           onchange="showSchool(this)" checked>
                                                    <span class=" form-check-sign"><span class="check"></span></span>
                                                    Editer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="type" value="3"
                                                       onchange="showSchool(this)">
                                                <span class="form-check-sign"><span class="check"></span></span>
                                                School manager
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="school-name" style="display: none">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="school" class="bmd-label-floating">Tên trường quản lý</label>
                                            <input type="text" name="school_name" id="school" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="bmd-label-floating">Mật khẩu</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="bmd-label-floating">Nhập lại mật
                                                khẩu</label>
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Tạo tài khoản</button>
                                <a href="{{route('admin.user.index')}}" class="btn btn-warning pull-right">Quay lại</a>
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
        function showSchool(obj) {
            if ($(obj).val() == 3) {
                $('#school-name').css('display', 'block');
            } else {
                $('#school-name').css('display', 'none');
            }
        }
    </script>
@endsection