@extends('index')

@section('title', $title)

@section('style')
    <style>
        .form-group input[type=file] {
            opacity: 1;
            position: relative;
            z-index: 1;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Nhập dữ liệu từ excel</p>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.import.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Nhập liệu năm {{$year}}</span>
                            <a href="{{route('university.import.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="content">
                            <h3>Tải file mẫu tại <a href="{{asset('file/Form.xlsx')}}" >đây</a></h3>
                            <form action="{{route('university.import.create', ['slug'=>$slug, 'year'=>($year+1)])}}"
                                  method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="file">Chọn file excel</label>
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                                <button type="submit" class="btn btn-success">Nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection