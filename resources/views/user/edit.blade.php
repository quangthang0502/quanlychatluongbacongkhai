@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-category">Complete your profile</p>
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.user.postEdit', ['slug' => $slug,'id'=>$user->id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Tên</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                   value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="bmd-label-floating">Email đăng nhập</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                   value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="school" class="bmd-label-floating">Tên trường quản lý</label>
                                            <input type="hidden" name="type" value="4">
                                            <input type="text" name="school_name" id="school" class="form-control"
                                                   value="{{$name}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="bmd-label-floating">Mật khẩu mới</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="bmd-label-floating">Nhập lại mật
                                                khẩu mới</label>
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Cập nhập tài khoản</button>
                                <a href="{{route('university.user.index', $slug)}}" class="btn btn-warning pull-right">Quay
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