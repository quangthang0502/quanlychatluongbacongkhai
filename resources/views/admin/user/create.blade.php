@extends('admin.include.template')

@section('title', $title)

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection

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
                            <form action="{{route('admin.user.postCreate')}}" method="post">
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
                                            <label for="school" class="bmd-label-floating">Trường đại học</label>
                                            <select type="text" name="school_name" id="school" class="form-control" style="width: 100%;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-info pull-right" data-toggle="modal"
                                                data-target="#myModal">Thêm trường học
                                        </button>
                                        <div style="clear: both"></div>
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bộ phận</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name_of_school" class="bmd-label-floating">Tên trường</label>
                                    <input type="text" name="name_of_school" id="name_of_school"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="type" class="bmd-label-floating">Loại trường</label>
                                    <select name="type" id="type"
                                            class="form-control">
                                        <option value="dai_hoc" selected>Đại học</option>
                                        <option value="cao_dang">Cao Đẳng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="themTruongHoc()">Tạo mới
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#school').select2({
                ajax: {
                    url: '{{ route('api.university') }}',
                    dataType: 'json',
                    cache: false,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.id + '. ' + item.vi_ten,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            })
        });
        function showSchool(obj) {
            if ($(obj).val() == 3) {
                $('#school-name').css('display', 'block');
            } else {
                $('#school-name').css('display', 'none');
            }
        }

        function themTruongHoc() {
            $.post('{{route('api.university')}}', {
                vi_ten: $('#name_of_school').val(),
                type: $('#type').val()
            }, function (result) {
                demo.showNotification('top', 'right', 'success', 'Thêm thành công');
            }).fail(function (error) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            });
        }
    </script>
@endsection