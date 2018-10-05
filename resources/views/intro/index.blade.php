@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường {{$university->vi_ten}}</p>
                    <a href="{{route('university.dashboard.edit', $slug)}}" class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">Thông tin chung của nhà trường</h3>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection