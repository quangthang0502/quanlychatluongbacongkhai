@extends('admin.include.template')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Danh các trường đại học</h4>
                            <p class="card-category">Đây là danh sách các trường đại học</p>
                            <a href="{{route('admin.user.create')}}" class="btn btn-info t-create-btn"><span
                                        class="fa fa-plus"></span></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên trường</th>
                                        <th>Viết tắt</th>
                                        <th>Loại trường</th>
                                        <th>Loại hình đào tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($universities as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->vi_ten}}</td>
                                            <td>{{$item->vi_viet_tat}}</td>
                                            <td>{{($item->type == 'dai_hoc')?'Đại học' : 'Cao đăng trung cấp'}}</td>
                                            <td>{{$item->loai_hinh_dao_tao}}</td>
                                            <td class="text-primary">
                                                <div class="btn-group" style="color: #fff !important;">
                                                    <a href="{{route('dashboard.university', $item->slug)}}"
                                                       type="button" class="btn btn-sm btn-danger">Xem</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection