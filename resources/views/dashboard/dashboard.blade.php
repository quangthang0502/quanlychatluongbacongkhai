@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-8">
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
                        <ul>
                            <li class="univer-name">
                                <div class="title">Tên trường</div>
                                <div class="content">
                                    <p><b>Tên tiếng Việt :</b> {{$university->vi_ten}}</p>
                                    <p><b>Tên tiếng Anh :</b> {{$university->en_ten}}</p>
                                </div>
                            </li>
                            <li>
                                <p><b>Viết tắt tiếng Việt :</b> {{$university->vi_viet_tat}}</p>
                                <p><b>Viết tắt tiếng Anh :</b> {{$university->en_viet_tat}}</p>
                            </li>
                            <li>
                                <p><b>Tên cũ :</b></p>
                                <p>{{$university->ten_cu}}</p>
                            </li>
                            <li>
                                <p><b>Cơ quan, Bộ chủ quản :</b> {{$university->co_quan}}</p>
                            </li>
                            <li>
                                <p><b>Địa chỉ của trường :</b> {{$university->dia_chi}}</p>
                            </li>
                            <li>
                                <div class="title">Liên hệ</div>
                                <div class="content">
                                    <p><b>Số điện thoại :</b> {{$university->dien_thoai}}</p>
                                    <p><b>Số Fax :</b> {{$university->fax}}</p>
                                    <p><b>Email :</b> {{$university->email}}</p>
                                    <p><b>Website :</b> {{$university->website}}</p>
                                </div>
                            </li>
                            <li>
                                <p><b> Năm thành lập trường
                                        :</b> {{date('d/m/Y', strtotime($university->nam_thanh_lap))}}</p>
                            </li>
                            <li>
                                <p><b> Thời gian bắt đầu đào tạo :</b> {{$university->thoi_gian_bat_dau_dao_tao}}</p>
                            </li>
                            <li>
                                <p><b>Thời gian cấp bằng tốt nghiệp cho khoá Đại học thứ nhất
                                        :</b> {{date('d/m/Y', strtotime($university->thoi_gian_cap_bang_khoa_dau))}}</p>
                            </li>
                            <li>
                                <p><b>Loại hình đào tạo :</b> {{$university->loai_hinh_dao_tao}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if(isset($gioiThieu))
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Thông tin cơ bản</h4>
                        <p class="card-category">Đây là thông tin cơ bản của trường {{$university->vi_ten}}</p>
                        <a href="{{route('university.dashboard.edit', $slug)}}" class="btn btn-info t-create-btn"><span
                                    class="fa fa-edit"></span></a>
                    </div>

                    <div class="card-body">
                        {{$gioiThieu->noi_dung}}
                    </div>
                </div>
            @endif

        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="">
                        <img class="img" src="{{url('img/images.jpg')}}"/>
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">Trường đại học</h6>
                    <h4 class="card-title">{{$university->vi_ten}}</h4>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love
                        you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection