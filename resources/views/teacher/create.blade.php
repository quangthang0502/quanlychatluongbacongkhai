@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thống kê số lượng cán bộ, giảng viên và nhân viên (gọi chung là cán
                                bộ) của
                                nhà trường:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger">
                                    <span><b> Cảnh báo - </b> {{$message}}</span>
                                </div>
                            @endforeach
                            <form action="{{route('university.teacher.postCreate', ['slug'=>$slug,'year'=> $year])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6" style="font-weight: bold">
                                        Cán bộ trong biên chế
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="bien_che_nam" class="bmd-label-floating">Nam</label>
                                                <input type="number" name="bien_che_nam" id="bien_che_nam"
                                                       class="form-control" value="{{$phanLoaiCanBo->bien_che_nam}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="bien_che_nư" class="bmd-label-floating">Nữ</label>
                                                <input type="number" name="bien_che_nư" id="bien_che_nư"
                                                       class="form-control" value="{{$phanLoaiCanBo->bien_che_nu}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="font-weight: bold">
                                        Cán bộ hợp đồng dài hạn (từ 1 năm trở lên) và
                                        hợp đồng không xác định thời hạn
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="hop_dong_nam" class="bmd-label-floating">Nam</label>
                                                <input type="number" name="hop_dong_nam" id="hop_dong_nam"
                                                       class="form-control" value="{{$phanLoaiCanBo->hop_dong_nam}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="hop_dong_nu" class="bmd-label-floating">Nữ</label>
                                                <input type="number" name="hop_dong_nu" id="hop_dong_nu"
                                                       class="form-control" value="{{$phanLoaiCanBo->hop_dong_nu}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="font-weight: bold">
                                        Hợp đồng ngắn hạn (dưới 1 năm, bao gồm cả
                                        giảng viên thỉnh giảng)
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cb_khac_nam" class="bmd-label-floating">Nam</label>
                                                <input type="number" name="cb_khac_nam" id="cb_khac_nam"
                                                       class="form-control" value="{{$phanLoaiCanBo->cb_khac_nam}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="cb_khac_nu" class="bmd-label-floating">Nữ</label>
                                                <input type="number" name="cb_khac_nu" id="cb_khac_nu"
                                                       class="form-control" value="{{$phanLoaiCanBo->cb_khac_nu}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 100%;text-align: right">
                                        <button type="submit" class="btn btn-success">Cập nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Thống kê giảng viên:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            @foreach($giangVien as $item)
                                <div class="giang-vien">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="bmd-label-floating"
                                                       style="font-weight: bold">{{getNameTeacher($item->trinh_do)}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="so_luong_{{$item->trinh_do}}" class="bmd-label-floating">Số
                                                    lượng</label>
                                                <input type="number" name="so_luong_{{$item->trinh_do}}"
                                                       id="so_luong_{{$item->trinh_do}}"
                                                       class="form-control" value="{{$item->so_luong}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="giao_vien_nam_{{$item->trinh_do}}"
                                                       class="bmd-label-floating">Giáo viên nam</label>
                                                <input type="number" name="giao_vien_nam_{{$item->trinh_do}}"
                                                       id="giao_vien_nam_{{$item->trinh_do}}"
                                                       class="form-control" value="{{$item->giao_vien_nam}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="gv_bien_che_{{$item->trinh_do}}" class="bmd-label-floating">Giáo
                                                    viên biên chế</label>
                                                <input type="number" name="gv_bien_che_{{$item->trinh_do}}"
                                                       id="gv_bien_che_{{$item->trinh_do}}"
                                                       class="form-control" value="{{$item->gv_bien_che}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="gv_hop_dong_{{$item->trinh_do}}" class="bmd-label-floating">Giáo
                                                    viên hợp đồng</label>
                                                <input type="number" name="gv_hop_dong_{{$item->trinh_do}}"
                                                       id="gv_hop_dong_{{$item->trinh_do}}"
                                                       class="form-control" value="{{$item->gv_hop_dong}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="gv_quan_ly_{{$item->trinh_do}}" class="bmd-label-floating">Giảng
                                                    viên tham gia quản lý</label>
                                                <input type="number" name="gv_quan_ly_{{$item->trinh_do}}"
                                                       id="gv_quan_ly_{{$item->trinh_do}}"
                                                       class="form-control" value="{{$item->gv_quan_ly}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
										<?php
										$tuoi = json_decode( $item->do_tuoi );
										?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tuoi_{{$item->trinh_do}}_lv_1" class="bmd-label-floating">
                                                    <30 tuổi</label>
                                                <input type="number" name="tuoi_{{$item->trinh_do}}_lv_1"
                                                       id="tuoi_{{$item->trinh_do}}_lv_1"
                                                       class="form-control" value="{{$tuoi->lv_1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tuoi_{{$item->trinh_do}}_lv_2" class="bmd-label-floating">Từ
                                                    30 - 40</label>
                                                <input type="number" name="tuoi_{{$item->trinh_do}}_lv_2"
                                                       id="tuoi_{{$item->trinh_do}}_lv_2"
                                                       class="form-control" value="{{$tuoi->lv_2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tuoi_{{$item->trinh_do}}_lv_3" class="bmd-label-floating">Từ
                                                    41 - 50</label>
                                                <input type="number" name="tuoi_{{$item->trinh_do}}_lv_3"
                                                       id="tuoi_{{$item->trinh_do}}_lv_3"
                                                       class="form-control" value="{{$tuoi->lv_3}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tuoi_{{$item->trinh_do}}_lv_4" class="bmd-label-floating">Từ
                                                    51 - 60</label>
                                                <input type="number" name="tuoi_{{$item->trinh_do}}_lv_4"
                                                       id="tuoi_{{$item->trinh_do}}_lv_4"
                                                       class="form-control" value="{{$tuoi->lv_4}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tuoi_{{$item->trinh_do}}_lv_5" class="bmd-label-floating">Lớn
                                                    hơn 60 tuổi</label>
                                                <input type="number" name="tuoi_{{$item->trinh_do}}_lv_5"
                                                       id="tuoi_{{$item->trinh_do}}_lv_5"
                                                       class="form-control" value="{{$tuoi->lv_5}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-success"
                                                        onclick="updateTeacher({{$item->trinh_do.','.$item->id}} )">
                                                    Cập nhập
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Trình độ ngoại ngữ, tin học:</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin
                        </div>
                        <div class="card-body">
                            <div class="giang-vien">
                                <div class="row">
									<?php
									$tiengAnh = json_decode( $trinhDo->trinh_do_ngoai_ngu );
									$tinHoc = json_decode( $trinhDo->tin_hoc );
									?>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tieng_anh_lv_1"
                                                   class="bmd-label-floating">0-20% tiếng anh</label>
                                            <input type="number" name="tieng_anh_lv_1"
                                                   id="tieng_anh_lv_1"
                                                   class="form-control" value="{{$tiengAnh->lv_1}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tieng_anh_lv_2"
                                                   class="bmd-label-floating">20-40% tiếng anh</label>
                                            <input type="number" name="tieng_anh_lv_2"
                                                   id="tieng_anh_lv_2"
                                                   class="form-control" value="{{$tiengAnh->lv_2}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tieng_anh_lv_3"
                                                   class="bmd-label-floating">40-60% tiếng anh</label>
                                            <input type="number" name="tieng_anh_lv_3"
                                                   id="tieng_anh_lv_3"
                                                   class="form-control" value="{{$tiengAnh->lv_3}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tieng_anh_lv_4"
                                                   class="bmd-label-floating">60-80% tiếng anh</label>
                                            <input type="number" name="tieng_anh_lv_4"
                                                   id="tieng_anh_lv_4"
                                                   class="form-control" value="{{$tiengAnh->lv_4}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tieng_anh_lv_5"
                                                   class="bmd-label-floating">>80% tiếng anh</label>
                                            <input type="number" name="tieng_anh_lv_5"
                                                   id="tieng_anh_lv_5"
                                                   class="form-control" value="{{$tiengAnh->lv_5}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tin_hoc_lv_1"
                                                   class="bmd-label-floating">0-20% tin học</label>
                                            <input type="number" name="tin_hoc_lv_1"
                                                   id="tin_hoc_lv_1"
                                                   class="form-control" value="{{$tinHoc->lv_1}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tin_hoc_lv_2"
                                                   class="bmd-label-floating">20-40% tin học</label>
                                            <input type="number" name="tin_hoc_lv_2"
                                                   id="tin_hoc_lv_2"
                                                   class="form-control" value="{{$tinHoc->lv_2}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tin_hoc_lv_3"
                                                   class="bmd-label-floating">40-60% tin học</label>
                                            <input type="number" name="tin_hoc_lv_3"
                                                   id="tin_hoc_lv_3"
                                                   class="form-control" value="{{$tinHoc->lv_3}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tin_hoc_lv_4"
                                                   class="bmd-label-floating">60-80% tin học</label>
                                            <input type="number" name="tin_hoc_lv_4"
                                                   id="tin_hoc_lv_4"
                                                   class="form-control" value="{{$tinHoc->lv_4}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tin_hoc_lv_5"
                                                   class="bmd-label-floating">>80% tin học</label>
                                            <input type="number" name="tin_hoc_lv_5"
                                                   id="tin_hoc_lv_5"
                                                   class="form-control" value="{{$tinHoc->lv_5}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-success"
                                                    onclick="updateLevel({{$trinhDo->id}})">
                                                Cập nhập
                                            </button>
                                        </div>
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

@section('script')
    <script>
        function updateTeacher(canBo, id) {
            let doTuoi = {
                'lv_1': $('#tuoi_' + canBo + '_lv_1').val(),
                'lv_2': $('#tuoi_' + canBo + '_lv_2').val(),
                'lv_3': $('#tuoi_' + canBo + '_lv_3').val(),
                'lv_4': $('#tuoi_' + canBo + '_lv_4').val(),
                'lv_5': $('#tuoi_' + canBo + '_lv_5').val(),
            };

            let data = {
                id: id,
                trinh_do: canBo,
                so_luong: $('#so_luong_' + canBo).val(),
                giao_vien_nam: $('#giao_vien_nam_' + canBo).val(),
                gv_bien_che: $('#gv_bien_che_' + canBo).val(),
                gv_hop_dong: $('#gv_hop_dong_' + canBo).val(),
                gv_quan_ly: $('#gv_quan_ly_' + canBo).val(),
                do_tuoi: JSON.stringify(doTuoi),
                _token: '{{csrf_token()}}'
            };

            $.post('{{route('university.teacher.updateTeacher', ['slug'=>$slug, 'year' => $year])}}',
                data, function (result) {
                    demo.showNotification('top', 'right', 'success', 'Cập nhập thành công');
                }).fail(function (errors) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            })
        }

        function updateLevel(id) {
            let tiengAnh = {
                'lv_1': $('#tieng_anh_lv_1').val(),
                'lv_2': $('#tieng_anh_lv_2').val(),
                'lv_3': $('#tieng_anh_lv_3').val(),
                'lv_4': $('#tieng_anh_lv_4').val(),
                'lv_5': $('#tieng_anh_lv_5').val(),
            };

            let tinHoc = {
                'lv_1': $('#tin_hoc_lv_1').val(),
                'lv_2': $('#tin_hoc_lv_2').val(),
                'lv_3': $('#tin_hoc_lv_3').val(),
                'lv_4': $('#tin_hoc_lv_4').val(),
                'lv_5': $('#tin_hoc_lv_5').val(),
            };

            let data = {
                id: id,
                _token: '{{csrf_token()}}',
                trinh_do_ngoai_ngu: JSON.stringify(tiengAnh),
                tin_hoc: JSON.stringify(tinHoc),
            };

            $.post('{{route('university.teacher.updateLevel', ['slug'=>$slug, 'year' => $year])}}',
                data, function (result) {
                    console.log(result);
                    demo.showNotification('top', 'right', 'success', 'Cập nhập thành công');
                }).fail(function (errors) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            })
        }
    </script>
@endsection
