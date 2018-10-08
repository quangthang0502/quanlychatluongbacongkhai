@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title"> Giới thiệu khái quát về nhà trường</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection