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
                            <p class="card-category">Vui lòng điền đủ thông tin</p>
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.intro.postEdit', ['slug' => $slug, 'gioiThieu' => $gioiThieu->id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="noi_dung" id="gioi-thieu" title="Giới thiệu" cols="30"
                                                      rows="10">{!! isset($gioiThieu) ? $gioiThieu->noi_dung : '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Thêm lịc sử trường học</button>
                                <a href="{{route('university.intro.index', $slug)}}" class="btn btn-warning pull-right">Quay
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
        $(document).ready(function () {
            $('#gioi-thieu').trumbowyg({
                autogrow: true,
            });
        })
    </script>
@endsection