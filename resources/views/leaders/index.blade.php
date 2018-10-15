@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                    <a href="{{route('university.leaders.create',['slug'=>$slug, 'year'=>$year])}}"
                       class="btn btn-info t-create-btn"><span
                                class="fa fa-edit"></span></a>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.leaders.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Danh sách cán bộ năm {{$year}}</span>
                            <a href="{{route('university.leaders.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th>Bộ phận</th>
                                    <th>Họ tên</th>
                                    <th>Năm sinh</th>
                                    <th>Học vị chức danh</th>
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
@endsection