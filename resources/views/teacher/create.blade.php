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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection