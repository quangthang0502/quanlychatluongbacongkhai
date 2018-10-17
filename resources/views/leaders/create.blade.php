@extends('index')

@section('title', $title)

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{$title}}</h4>
                            <p class="card-category">Vui lòng điền đủ thông tin</p>
                        </div>
                        <div class="card-body">
                            <div class="row" style="border-bottom: 1px solid #e1e1e1">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th>Bộ phận</th>
                                            <th>Họ tên</th>
                                            <th>Năm sinh</th>
                                            <th>Học vị chức danh</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody id="list-staffs">
                                        @foreach($data as $item)
                                            <tr>
                                                <td>
                                                    <span style="display: block">{{$item->bo_phan}}</span>
                                                    <span style="display: block">{{$item->nhom_bo_phan}}</span>
                                                </td>
                                                <td>
                                                    {{$item->ho_va_ten}}
                                                </td>
                                                <td>{{$item->nam_sinh}}</td>
                                                <td>
                                                    {{$item->hoc_vi.', '. $item->chuc_vu}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger"
                                                       href="{{route('university.leaders.delete', ['slug'=>$slug, 'id'=> $item->id])}}">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="thong_ke_nam" class="bmd-label-floating">Năm thống
                                                kê</label>
                                            <input type="number" name="thong_ke_nam" id="thong_ke_nam"
                                                   class="form-control"
                                                   value="{{$year}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Họ và tên</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="hoc_vi" class="bmd-label-floating">Học vị</label>
                                            <input type="text" name="hoc_vi" id="hoc_vi" class="form-control"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="chuc_vu" class="bmd-label-floating">Chức vụ</label>
                                            <input type="text" name="chuc_vu" id="chuc_vu" class="form-control"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="nam_sinh" class="bmd-label-floating">Năm sinh</label>
                                            <input type="number" name="nam_sinh" id="nam_sinh" class="form-control"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="bo_phan" class="bmd-label-floating">Bộ phận</label>
                                            <select type="text" name="bo_phan" id="bo_phan"
                                                    class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="btn-group" role="group" aria-label="First group"
                                     style="margin-left: calc(100% - 300px)">
                                    <button type="button" class="btn btn-info pull-right" data-toggle="modal"
                                            data-target="#myModal">Thêm bộ phận
                                    </button>
                                    <button type="button" class="btn btn-primary pull-right" onclick="sendAjax()">Thêm
                                        cán
                                        bộ
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bộ phận</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name_staff" class="bmd-label-floating">Tên bộ phận</label>
                                    <input type="text" name="name_staff" id="name_staff"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="group_staff" class="bmd-label-floating">Nhóm bộ phận</label>
                                    <input type="text" name="group_staff" id="group_staff"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="taoCanBo()">Tạo mới
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#bo_phan').select2({
                ajax: {
                    url: '{{ route('api.bo-phan') }}',
                    dataType: 'json',
                    cache: false,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.id + '. ' + item.name,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            })
        });

        function taoCanBo() {
            $.post('{{route('api.bo-phan')}}', {
                name: $('#name_staff').val(),
                group: $('#group_staff').val()
            }, function (result) {
                demo.showNotification('top', 'right', 'success', 'Tạo mới thành công');
            }).fail(function (error) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            });
        }

        function sendAjax() {
            $.post('{{route('university.leaders.postCreate', $slug)}}', {
                thong_ke_nam: $('#thong_ke_nam').val(),
                bo_phan_id: $('#bo_phan').val(),
                hoc_vi: $('#hoc_vi').val(),
                chuc_vu: $('#chuc_vu').val(),
                ho_va_ten: $('#name').val(),
                nam_sinh: $('#nam_sinh').val(),
                _token: '{{csrf_token()}}'
            }, function (result) {
                let content = '<tr>' +
                    '<td>' +
                    '<span style="display: block">' + result.bo_phan + '</span>' +
                    '<span style="display: block">' + result.nhom_bo_phan + '</span>' +
                    '</td>' +
                    '<td>' + result.ho_va_ten + '</td>' +
                    '<td>' + result.nam_sinh + '</td>' +
                    '<td>' + result.hoc_vi + ', ' + result.chuc_vu + '</td>' +
                    '<td><button>aa</button></td>'
                    + '</tr>';
                $('#list-staffs').append(content);
                $('input:not(#thong_ke_nam)').val('');
                demo.showNotification('top', 'right', 'success', 'Thêm thành công');
            }).fail(function (error) {
                demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
            });
        }
    </script>
@endsection