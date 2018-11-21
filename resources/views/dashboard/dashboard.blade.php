@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-9">
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
        </div>
        <div class="col-md-3">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="">
                        <img class="img" src="{{url('img/images.jpg')}}"/>
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">Trường đại học</h6>
                    <h4 class="card-title">{{$university->vi_ten}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="nhapHoc"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Sinh viên nhập học 5 năm gần đây</h4>
                    <p class="card-category">
                        @if($nhapHoc[date('Y')] >= $nhapHoc[date('Y')-1] && $nhapHoc[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$nhapHoc[date('Y')]/($nhapHoc[date('Y')-1])*100}}
                                % so với năm ngoái</span></p>
                    @elseif($nhapHoc[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$nhapHoc[date('Y')]/($nhapHoc[date('Y')-1])*100}}
                            % so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="sinhVienTotNghiep"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Sinh viên tốt nghiệp 5 năm gần đây</h4>
                    <p class="card-category">
                        @if($svTotNghiep[date('Y')] >= $svTotNghiep[date('Y')-1] && $svTotNghiep[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$svTotNghiep[date('Y')]/($svTotNghiep[date('Y')-1])*100}}
                                % so với năm ngoái</span></p>
                    @elseif($svTotNghiep[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$svTotNghiep[date('Y')]/($svTotNghiep[date('Y')-1])*100}}
                            % so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="taiChinh"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Tổng kinh phí từ các nguồn thu của trường trong 5 năm gần đây</h4>
                    <p class="card-category">
                        @if($taiChinh[date('Y')] >= $taiChinh[date('Y')-1] && $taiChinh[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$taiChinh[date('Y')]/($taiChinh[date('Y')-1])*100}}
                                % so với năm ngoái</span></p>
                    @elseif($taiChinh[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$taiChinh[date('Y')]/($svTotNghiep[date('Y')-1])*100}}
                            % so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="nckh"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Tổng số nghiên cứu khoa học 5 năm gần đây</h4>
                    <p class="card-category">
                        @if($nckh[date('Y')] >= $nckh[date('Y')-1] && $nckh[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$nckh[date('Y')]/($nckh[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @elseif($nckh[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$nckh[date('Y')]/($nckh[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="sach"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Tổng số sách xuất bản 5 năm gần đây</h4>
                    <p class="card-category">
                        @if($sach[date('Y')] >= $sach[date('Y')-1] && $sach[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$sach[date('Y')]/($sach[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @elseif($sach[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$sach[date('Y')]/($sach[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <canvas class="ct-chart" id="hoiThao"
                            style="width: 100%; height: 200px; color:#fff;"></canvas>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Số lượng báo cáo khoa học do cán bộ cơ hữu của nhà trường báo cáo tại các hội
                        nghị, hội thảo, được đăng toàn văn trong tuyển tập công trình hay kỷ yếu trong 5 năm gần
                        đây</h4>
                    <p class="card-category">
                        @if($hoiThao[date('Y')] >= $hoiThao[date('Y')-1] && $hoiThao[date('Y')-1] != 0)
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i>
                                {{$hoiThao[date('Y')]/($hoiThao[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @elseif($hoiThao[date('Y')-1] != 0)
                        <span class="text-danger"><i class="fa fa-long-arrow-down"></i>
                            {{$hoiThao[date('Y')]/($hoiThao[date('Y')-1])*100}}% so với năm ngoái</span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('node_modules/chart.js/dist/Chart.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            let ctx = $('#sinhVienTotNghiep');
            let myLabel = [
                @foreach ($label as $item)
                    '{{$item}}',
                @endforeach
            ];

            let sinhVienTotNghiep = [
                @foreach ($svTotNghiep as $item)
                {{$item}},
                @endforeach
            ];
            let nckh = [
                @foreach ($nckh as $item)
                {{$item}},
                @endforeach
            ];
            let sach = [
                @foreach ($sach as $item)
                {{$item}},
                @endforeach
            ];
            let hoiThao = [
                @foreach ($hoiThao as $item)
                {{$item}},
                @endforeach
            ];
            let nhapHoc = [
                @foreach ($nhapHoc as $item)
                {{$item}},
                @endforeach
            ];
            let taiChinh = [
                @foreach ($taiChinh as $item)
                {{$item}},
                @endforeach
            ];

            new Chart(ctx, {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Sinh viên tốt nghiệp',
                        data: sinhVienTotNghiep,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            });
            new Chart($('#nckh'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Nghiên cứu khoa học',
                        data: nckh,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            });
            new Chart($('#sach'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Sách',
                        data: sach,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            })
            new Chart($('#hoiThao'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Sách',
                        data: hoiThao,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            }) ;
            new Chart($('#nhapHoc'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Sách',
                        data: nhapHoc,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            });
            new Chart($('#taiChinh'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Sách',
                        data: taiChinh,
                        backgroundColor: '#fff'
                    }],
                    labels: myLabel,
                    bodyFontColor: '#fff'
                },
            })
        })
    </script>
@endsection