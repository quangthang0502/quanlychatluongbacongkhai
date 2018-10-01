@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường {{$university->vi_name}}</p>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="">
                        <img class="img" src="{{url('img/faces/marc.jpg')}}" />
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">Trường đại học</h6>
                    <h4 class="card-title">{{$university->vi_ten}}</h4>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection