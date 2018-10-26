@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Thống kê trong 5 năm </span>
                            <a href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Số lượng đề tài nghiên cứu khoa học và chuyển giao khoa học công nghệ
                                    của nhà trường được nghiệm thu trong 5 năm gần đây
                                </h4>
                                @if(isset($soLuongNckh))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Phân loại đề tài</th>
                                                    <th rowspan="2">Hệ số</th>
                                                    <th rowspan="1" colspan="6">Số lượng</th>

                                                </tr>
                                                <tr>
                                                    <th rowspan="1">{{$year-4}}</th>
                                                    <th rowspan="1">{{$year-3}}</th>
                                                    <th rowspan="1">{{$year-2}}</th>
                                                    <th rowspan="1">{{$year-1}}</th>
                                                    <th rowspan="1">{{$year}}</th>
                                                    <th rowspan="1">Tổng(đã quy đổi)</th>

                                                </tr>

                                                </thead>
                                                <tbody>
                                                <?php $key = ['cap_nn', 'cap_bo', 'cap_truong'] ?>
                                                @for($i = 0; $i < 3; $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]]['name']}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]]['he_so']}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]][$year-4]}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]][$year-3]}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]][$year-2]}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]][$year-1]}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]][$year]}}</td>
                                                        <td>{{$soLuongNckh[$key[$i]]['tong']}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                            <p style="font-weight: bold">
                                                <strong> Tổng số đề tài quy
                                                    đổi: {{$soLuongNckh['tong_quy_doi']}} </strong>
                                                <br>
                                                <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                    nghệ (quy đổi)
                                                    trên cán bộ cơ hữu: ???? </strong>
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="thong-tin-dao-tao" style="margin-top: 40px">
                            <div class="mini-box">
                                <h4 class="title">
                                    Doanh thu từ nghiên cứu khoa học và chuyển giao công nghệ của nhà trường
                                    trong 5 năm gần đây
                                </h4>
                                @if(isset($doanhThu))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Năm</th>
                                                    <th rowspan="2">Doanh thu từ NCKH và chuyển giao công nghệ (triệu
                                                        VNĐ)
                                                    </th>
                                                    <th rowspan="2">Tỷ lệ doanh thu từ NCKH và chuyển giao công nghệ so
                                                        với tổng kinh phí đầu vào của nhà trường(%)
                                                    </th>
                                                    <th rowspan="2">Tỷ số doanh thu từ NCKH và chuyển giao công nghệ
                                                        trên cán bộ cơ hữu (triệu VND/người)
                                                    </th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @for($i = 0; $i < 5; $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$year - $i}}</td>
                                                        <td>{{$doanhThu[$year - $i]['doanh_thu']}}</td>
                                                        <td>{{$doanhThu[$year - $i]['ti_le']}}</td>
                                                        <td>{{$doanhThu[$year - $i]['ti_so']}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.teacher.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection