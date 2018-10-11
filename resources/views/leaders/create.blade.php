@extends('index')

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
                            <h4 class="card-title">{{$title}}</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin</p>
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="en_ten" class="bmd-label-floating">Họ và tên</label>
                                                <input type="text" name="en_ten" id="en_ten" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="en_ten" class="bmd-label-floating">Học vị</label>
                                                <input type="text" name="en_ten" id="en_ten" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="nam_sinh" class="bmd-label-floating">Năm sinh</label>
                                                <input type="number" name="nam_sinh" id="nam_sinh" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="chuc_vu" class="bmd-label-floating">Bộ phận</label>
                                                <select type="text" name="chuc_vu" id="chuc_vu"
                                                        class="form-control"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Thêm cán bộ
                                </button>
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

@section('script')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#chuc_vu').select2({
                ajax: {
                    url: '{{ route('api.bo-phan') }}',
                    dataType: 'json',
                    cache: false,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.id + '. ' + item.name,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            })
        });
    </script>
@endsection