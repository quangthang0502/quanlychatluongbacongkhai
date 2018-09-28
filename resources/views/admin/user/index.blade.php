@extends('admin.include.template')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Danh sách user</h4>
                            <p class="card-category">Đây là danh sách các user đưới quyền quản lý của bạn</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Loại</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->type}}</td>
                                            <td class="text-primary">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning">Sửa</button>
                                                    <button type="button" class="btn btn-danger">xóa</button>
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