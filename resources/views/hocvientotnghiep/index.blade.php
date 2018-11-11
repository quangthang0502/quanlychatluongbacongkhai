@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.sv.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.sv.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                            <a href="{{route('university.sv.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">Thống kê số lượng người tốt nghiệp trong 5 năm gần đây:</h4>
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: center">
                                            <thead class="text-primary">
                                            <tr>
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="2">1. Nghiên cứu sinh bảo vệ thành
                                                    công luận án tiến sĩ
                                                </th>
                                                <th rowspan="2">2. Học viên tốt nghiệp cao học</th>
                                                <th rowspan="1" colspan="2">3. Sinh viên tốt nghiệp đại học</th>
                                                <th rowspan="1" colspan="2">4. Sinh viên tốt nghiệp cao đẳng</th>
                                                <th rowspan="1" colspan="2">5. Sinh viên tốt nghiệp trung cấp</th>
                                                <th rowspan="2">Khác</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                                <th rowspan="1">Hệ chính quy</th>
                                                <th rowspan="1">Hệ không chính quy</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($totNghiep as $item)
                                                <tr>
                                                    <td>{{($item->thong_ke_nam - 1).'-'.$item->thong_ke_nam}}</td>
                                                    <td>{{($item->nghien_cuu_sinh != 0)?$item->nghien_cuu_sinh :'-'}}</td>
                                                    <td>{{($item->hoc_vien_cao_hoc != 0)?$item->hoc_vien_cao_hoc :'-'}}</td>
                                                    <td>{{($item->dh_he_chinh_quy != 0)?$item->dh_he_chinh_quy :'-'}}</td>
                                                    <td>{{($item->dh_he_khong_chinh_quy != 0)?$item->dh_he_khong_chinh_quy :'-'}}</td>
                                                    <td>{{($item->cd_he_chinh_quy != 0)?$item->cd_he_chinh_quy :'-'}}</td>
                                                    <td>{{($item->cd_he_khong_chinh_quy != 0)?$item->cd_he_khong_chinh_quy :'-'}}</td>
                                                    <td>{{($item->tccn_he_chinh_quy != 0)?$item->tccn_he_chinh_quy :'-'}}</td>
                                                    <td>{{($item->tccn_he_khong_chinh_quy != 0)?$item->tccn_he_khong_chinh_quy :'-'}}</td>
                                                    <td>{{($item->khac != 0)?$item->khac:'-'}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Tình trạng tốt nghiệp của sinh viên hệ chính quy
                                </h4>
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" >
                                            <thead class="text-primary">
                                            <tr style="text-align: center">
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="1" colspan="5">Năm tốt nghiệp</th>
                                            </tr>
                                            <tr style="text-align: center">
                                                @foreach($sinhVienChinhQuy->year as $item)
                                                    <th rowspan="1">{{$item}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                                @foreach($sinhVienChinhQuy->so_luong as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                                @foreach($sinhVienChinhQuy->ty_le_tot_nghiep as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của nhà
                                                    trường: <br>
                                                    A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                                </td>
                                                <td rowspan="2" colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                    những kiến thức và kỹ năng cần thiết
                                                    cho công việc theo ngành tốt nghiệp
                                                    (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_3_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và kỹ
                                                    năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_3_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                    được những kiến thức và kỹ năng cần
                                                    thiết cho công việc theo ngành tốt
                                                    nghiệp
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_3_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4. Sinh viên có việc làm trong năm
                                                    đầu tiên sau khi tốt nghiệp:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống câu 5<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                    ngành đào tạo (%)<br>
                                                    - Sau 12 tháng tốt nghiệp
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_4_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                    ngành đào tạo (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_4_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4.3 Thu nhập bình quân/tháng của sinh
                                                    viên có việc làm
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_4_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5. Đánh giá của nhà tuyển dụng về
                                                    sinh viên tốt nghiệp có việc làm đúng
                                                    ngành đào tạo:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống kết thúc bảng
                                                    này<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                    của công việc, có thể sử dụng được
                                                    ngay (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_5_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                    cầu của công việc, nhưng phải đào tạo
                                                    thêm (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_5_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                    lại hoặc đào tạo bổ sung ít nhất 6
                                                    tháng (%)
                                                </td>
                                                @foreach($sinhVienChinhQuy->cau_5_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title">
                                    Tình trạng tốt nghiệp của sinh viên hệ cao đẳng hệ chính quy
                                </h4>
                                <div class="box-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" >
                                            <thead class="text-primary">
                                            <tr style="text-align: center">
                                                <th rowspan="2">Các tiêu chí</th>
                                                <th rowspan="1" colspan="5">Năm tốt nghiệp</th>
                                            </tr>
                                            <tr style="text-align: center">
                                                @foreach($sinhVienCaoDang->year as $item)
                                                    <th rowspan="1">{{$item}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1. Số lượng sinh viên tốt nghiệp (người)</td>
                                                @foreach($sinhVienCaoDang->so_luong as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>2. Tỷ lệ sinh viên tốt nghiệp so với số tuyển vào (%)</td>
                                                @foreach($sinhVienCaoDang->ty_le_tot_nghiep as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Đánh giá của sinh viên tốt nghiệp về chất lượng đào tạo của nhà
                                                    trường: <br>
                                                    A. Nhà trường không điều tra về vấn đề này → chuyển xuống câu 4
                                                </td>
                                                <td rowspan="2" colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.1 Tỷ lệ sinh viên trả lời đã học được
                                                    những kiến thức và kỹ năng cần thiết
                                                    cho công việc theo ngành tốt nghiệp
                                                    (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_3_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>3.2 Tỷ lệ sinh viên trả lời chỉ học được một phần kiến thức và kỹ
                                                    năng cần thiết cho công việc theo ngành tốt nghiệp (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_3_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>3.3 Tỷ lệ sinh viên trả lời KHÔNG học
                                                    được những kiến thức và kỹ năng cần
                                                    thiết cho công việc theo ngành tốt
                                                    nghiệp
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_3_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4. Sinh viên có việc làm trong năm
                                                    đầu tiên sau khi tốt nghiệp:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống câu 5<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>4.1 Tỷ lệ sinh viên có việc làm đúng
                                                    ngành đào tạo (%)<br>
                                                    - Sau 12 tháng tốt nghiệp
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_4_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4.2 Tỷ lệ sinh viên có việc làm trái
                                                    ngành đào tạo (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_4_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>4.3 Thu nhập bình quân/tháng của sinh
                                                    viên có việc làm
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_4_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5. Đánh giá của nhà tuyển dụng về
                                                    sinh viên tốt nghiệp có việc làm đúng
                                                    ngành đào tạo:<br>
                                                    A. Nhà trường không điều tra về vấn
                                                    đề này → chuyển xuống kết thúc bảng
                                                    này<br>
                                                    B. Nhà trường có điều tra về vấn đề
                                                    này → điền các thông tin dưới đây
                                                </td>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td>5.1 Tỷ lệ sinh viên đáp ứng yêu cầu
                                                    của công việc, có thể sử dụng được
                                                    ngay (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_5_1 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5.2 Tỷ lệ sinh viên cơ bản đáp ứng yêu
                                                    cầu của công việc, nhưng phải đào tạo
                                                    thêm (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_5_2 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': $item}}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>5.3 Tỷ lệ sinh viên phải được đào tạo
                                                    lại hoặc đào tạo bổ sung ít nhất 6
                                                    tháng (%)
                                                </td>
                                                @foreach($sinhVienCaoDang->cau_5_3 as $item)
                                                    <td rowspan="1">{{($item == 0 )? '-': '>'.$item.' Triệu'}}</td>
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection