@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.research.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Thống kê trong 5 năm </span>
                            <a href="{{route('university.research.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
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
                                                        <td>{{isset($soLuongNckh[$key[$i]][$year-4]) ? $soLuongNckh[$key[$i]][$year - 4] : 0}}</td>
                                                        <td>{{isset($soLuongNckh[$key[$i]][$year-3]) ? $soLuongNckh[$key[$i]][$year - 3] : 0}}</td>
                                                        <td>{{isset($soLuongNckh[$key[$i]][$year-2]) ? $soLuongNckh[$key[$i]][$year - 2] : 0}}</td>
                                                        <td>{{isset($soLuongNckh[$key[$i]][$year-1]) ? $soLuongNckh[$key[$i]][$year - 1] : 0}}</td>
                                                        <td>{{isset($soLuongNckh[$key[$i]][$year]) ? $soLuongNckh[$key[$i]][$year] : 0}}</td>
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
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
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
                                                        <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['doanh_thu'] : 0 }}</td>
                                                        <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['ti_le'] : 0 }}</td>
                                                        <td>{{isset($doanhThu[$year-$i]) ? $doanhThu[$year - $i]['ti_so'] : 0 }}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="thong-tin-dao-tao" style="margin-top: 40px">
                            <div class="mini-box">
                                <h4 class="title">
                                    Số lượng sách của nhà trường được xuất bản trong 5 năm gần đây
                                </h4>
                                @if(isset($soLuongSach))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Phân loại sách</th>
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
                                                <?php $key = ['chuyen_khao', 'giao_trinh', 'tham_khao', 'huong_dan'] ?>
                                                @for($i = 0; $i < 4; $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$soLuongSach[$key[$i]]['name']}}</td>
                                                        <td>{{$soLuongSach[$key[$i]]['he_so']}}</td>
                                                        <td>{{isset($soLuongSach[$key[$i]][$year-4]) ? $soLuongSach[$key[$i]][$year - 4 ]: 0}}</td>
                                                        <td>{{isset($soLuongSach[$key[$i]][$year-3]) ? $soLuongSach[$key[$i]][$year - 3 ]: 0}}</td>
                                                        <td>{{isset($soLuongSach[$key[$i]][$year-2]) ? $soLuongSach[$key[$i]][$year - 2 ]: 0}}</td>
                                                        <td>{{isset($soLuongSach[$key[$i]][$year-1]) ? $soLuongSach[$key[$i]][$year - 1 ]: 0}}</td>
                                                        <td>{{isset($soLuongSach[$key[$i]][$year]) ? $soLuongSach[$key[$i]][$year] : 0}}</td>
                                                        <td>{{$soLuongSach[$key[$i]]['tong']}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                            <p style="font-weight: bold">
                                                <strong> Tổng số đề tài quy
                                                    đổi: {{$soLuongSach['tong_quy_doi']}} </strong>
                                                <br>
                                                <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                    nghệ (quy đổi)
                                                    trên cán bộ cơ hữu: {{$soLuongSach['ty_so_sach']}} </strong>
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="thong-tin-dao-tao" style="margin-top: 40px">
                            <div class="mini-box">
                                <h4 class="title">
                                    Số lượng bài của các cán bộ cơ hữu của nhà trường được đăng tạp chí trong
                                    5 năm gần đây
                                </h4>
                                @if(isset($soLuongTapChi))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Phân loại sách</th>
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
                                                <?php $key = ['quoc_te', 'trong_nuoc', 'cap_truong'] ?>
                                                @for($i = 0; $i < 3; $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$soLuongTapChi[$key[$i]]['name']}}</td>
                                                        <td>{{$soLuongTapChi[$key[$i]]['he_so']}}</td>
                                                        <td>{{isset($soLuongTapChi[$key[$i]][$year-4]) ? $soLuongTapChi[$key[$i]][$year-4] : 0 }}</td>
                                                        <td>{{isset($soLuongTapChi[$key[$i]][$year-3]) ? $soLuongTapChi[$key[$i]][$year-3] : 0 }}</td>
                                                        <td>{{isset($soLuongTapChi[$key[$i]][$year-2]) ? $soLuongTapChi[$key[$i]][$year-2] : 0 }}</td>
                                                        <td>{{isset($soLuongTapChi[$key[$i]][$year-1]) ? $soLuongTapChi[$key[$i]][$year-1] : 0 }}</td>
                                                        <td>{{isset($soLuongTapChi[$key[$i]][$year]) ? $soLuongTapChi[$key[$i]][$year] : 0 }}</td>
                                                        <td>{{$soLuongTapChi[$key[$i]]['tong']}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                            <p style="font-weight: bold">
                                                <strong> Tổng số đề tài quy
                                                    đổi: {{$soLuongTapChi['tong_quy_doi']}} </strong>
                                                <br>
                                                <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                    nghệ (quy đổi)
                                                    trên cán bộ cơ hữu: {{$soLuongTapChi['ty_so_tap_chi']}} </strong>
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="thong-tin-dao-tao" style="margin-top: 40px">
                            <div class="mini-box">
                                <h4 class="title">
                                    Số lượng báo cáo khoa học do cán bộ cơ hữu của nhà trường báo cáo tại các
                                    hội nghị, hội thảo, được đăng toàn văn trong tuyển tập công trình hay kỷ yếu
                                    trong 5 năm gần đây
                                </h4>
                                @if(isset($soLuongHoiThao))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">STT</th>
                                                    <th rowspan="2">Phân loại sách</th>
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
                                                <?php $key = ['quoc_te', 'trong_nuoc', 'cap_truong'] ?>
                                                @for($i = 0; $i < 3; $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$soLuongHoiThao[$key[$i]]['name']}}</td>
                                                        <td>{{$soLuongHoiThao[$key[$i]]['he_so']}}</td>
                                                        <td>{{isset($soLuongHoiThao[$key[$i]][$year-4]) ? $soLuongHoiThao[$key[$i]][$year-4] : 0 }}</td>
                                                        <td>{{isset($soLuongHoiThao[$key[$i]][$year-3]) ? $soLuongHoiThao[$key[$i]][$year-3] : 0 }}</td>
                                                        <td>{{isset($soLuongHoiThao[$key[$i]][$year-2]) ? $soLuongHoiThao[$key[$i]][$year-2] : 0 }}</td>
                                                        <td>{{isset($soLuongHoiThao[$key[$i]][$year-1]) ? $soLuongHoiThao[$key[$i]][$year-1] : 0 }}</td>
                                                        <td>{{isset($soLuongHoiThao[$key[$i]][$year]) ? $soLuongHoiThao[$key[$i]][$year] : 0 }}</td>
                                                        <td>{{$soLuongHoiThao[$key[$i]]['tong']}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                            <p style="font-weight: bold">
                                                <strong> Tổng số đề tài quy
                                                    đổi: {{$soLuongHoiThao['tong_quy_doi']}} </strong>
                                                <br>
                                                <strong> Tỷ số đề tài nghiên cứu khoa học và chuyển giao khoa học công
                                                    nghệ (quy đổi)
                                                    trên cán bộ cơ hữu: {{$soLuongHoiThao['ty_so_bai_bao']}} </strong>
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
                                           class="btn btn-info t-create-btn">Cập nhập ngay</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="thong-tin-dao-tao" style="margin-top: 40px">
                            <div class="mini-box">
                                <h4 class="title">
                                    Số bằng phát minh, sáng chế được cấp trong 5 năm gần đây
                                </h4>
                                @if(isset($sangChe))
                                    <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="text-align: center">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th rowspan="2">Năm học</th>
                                                    <th rowspan="2">Số bằng phát minh, sáng chế được cấp
                                                        (ghi rõ nơi cấp, thời gian cấp, người được cấp)</th>

                                                </tr>

                                                </thead>
                                                <tbody>
                                                @for($i = 4; $i >= 0; $i--)
                                                    <tr>
                                                        <td>{{$year - $i - 1}}-{{$year - $i}}</td>
                                                        <td>{{isset($sangChe[$year-$i]) ? $sangChe[$year - $i]['noi_dung'] : "-" }}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                @else
                                    <div style="text-align: center">
                                        <a href="{{route('university.research.create',['slug'=>$slug, 'year'=>$year])}}"
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