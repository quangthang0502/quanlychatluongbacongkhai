@extends('index')

@section('title', $title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Danh sách user</h4>
                            <p class="card-category">Lựa chọn quyền để phân cho user</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        @foreach($role as $item)
                                            <th>{{getRoleName($item)}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
											<?php $thisRole = is_array( json_decode( $item->role ) ) ? json_decode( $item->role ) : [];?>
                                            @foreach($role as $varxx)
                                                <td>
                                                    <input title="box" type="checkbox" name="1" value="1"
                                                           onchange="clickCheckBox('{{$item->id}}','{{$varxx}}',this)"
                                                           @if(in_array($varxx, $thisRole)) checked @endif
                                                    >
                                                </td>
                                            @endforeach
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

@section('script')
    <script>
        function clickCheckBox(userId, role, obj) {
            let action = $(obj).prop('checked');
            $.get('{{route('university.role.post')}}', {
                userId: userId,
                role: role,
                action: action
            }, function (result) {
                demo.showNotification('top', 'right', 'success', 'Chỉnh sửa thành công');
            }).fail(function (error) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            });
            console.log(userId, role,)
        }
    </script>
@endsection