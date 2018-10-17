@extends('index')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$title}}</h4>
                    <p class="card-category">Đây là thông tin cơ bản của trường</p>
                </div>
                <div class="card-body">
                    <div class="t-box">
                        <h3 class="title">
                            <a href="{{route('university.training.index', ['slug'=>$slug, 'year'=>($year-1)])}}"
                               class="staff t-left" href="">Xem năm {{$year-1}}</a>
                            <span class="span-staff">Thông tin đào tạo năm {{$year}}</span>
                            <a href="{{route('university.training.index', ['slug'=>$slug, 'year'=>($year+1)])}}"
                               class="staff t-right" href="">Xem năm {{$year+1}}</a>
                        </h3>
                        <div class="thong-tin-dao-tao">
                            <div class="mini-box">
                                <h4 class="title"> Tổng số các khoa đào tạo:
                                    <input title="tong so khoa" type="text" id="tong_so_cac_khoa"
                                           name="tong_so_cac_khoa"
                                           value="{{$daoTao->tong_so_cac_khoa}}" readonly></h4>
                            </div>
                            <div class="mini-box">
                                <h4 class="title">Các ngành/ chuyên ngành đào tạo (còn gọi là chương trình đào
                                    tạo): </h4>
                                <ul class="count">
                                    <li>Số lượng chuyên ngành đào tạo tiến sĩ:
                                        <input title="tong so khoa" type="text" id="dao_tao_tien_sy"
                                               name="dao_tao_tien_sy" value="{{$chuyenNganhDaoTao->dao_tao_tien_sy}}"
                                               readonly></li>
                                    <li>Số lượng chuyên ngành đào tạo thạc sĩ:
                                        <input title="tong so khoa" type="text" id="dao_tao_thac_sy"
                                               name="dao_tao_thac_sy" value="{{$chuyenNganhDaoTao->dao_tao_thac_sy}}"
                                               readonly></li>
                                    <li>Số lượng ngành đào tạo đại học:
                                        <input title="tong so khoa" type="text" id="dao_tao_dai_hoc"
                                               name="dao_tao_dai_hoc" value="{{$chuyenNganhDaoTao->dao_tao_dai_hoc}}"
                                               readonly></li>
                                    <li>Số lượng ngành đào tạo cao đẳng:
                                        <input title="tong so khoa" type="text" id="dao_tao_cao_dang"
                                               name="dao_tao_cao_dang" value="{{$chuyenNganhDaoTao->dao_tao_cao_dang}}"
                                               readonly></li>
                                    <li>Số lượng ngành đào tạo TCCN:
                                        <input title="tong so khoa" type="text" id="dao_tao_tccn" name="dao_tao_tccn"
                                               value="{{$chuyenNganhDaoTao->dao_tao_tccn}}"
                                               readonly></li>
                                    <li>Số lượng ngành đào tạo nghề:
                                        <input title="tong so khoa" type="text" id="dao_tao_nghe" name="dao_tao_nghe"
                                               value="{{$chuyenNganhDaoTao->dao_tao_nghe}}"
                                               readonly></li>
                                    <li>Số lượng ngành (chuyên ngành) đào tạo khác (đề nghị nêu rõ):
                                        <input title="tong so khoa" type="text" id="dao_tao_khac" name="dao_tao_khac"
                                               value="{{$chuyenNganhDaoTao->dao_tao_khac}}"
                                               style="display: block;width: 70%;" readonly></li>
                                </ul>
                            </div>
                            <div class="mini-box">
                                <h4 class="title">Các loại hình đào tạo của nhà trường (đánh dấu x vào các ô tương
                                    ứng) </h4>
                                <ul class="type">
                                    <li>
                                        <div class="content">Chính quy</div>
                                        <div class="yes">
                                            <input title="radio" type="radio" name="chinh_quy"
                                                   @if($loaiHinhDaoTao->chinh_quy == 1) checked @endif
                                                   value="1">Có
                                        </div>
                                        <div class="no">
                                            <input title="radio" type="radio" name="chinh_quy"
                                                   @if($loaiHinhDaoTao->chinh_quy == 0) checked @endif
                                                   value="0">Không
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">Không chính quy</div>
                                        <div class="yes">
                                            <input title="radio" type="radio" name="khong_chinh_quy"
                                                   @if($loaiHinhDaoTao->khong_chinh_quy == 1) checked
                                                   @endif  value="1">Có
                                        </div>
                                        <div class="no">
                                            <input title="radio" type="radio" name="khong_chinh_quy"
                                                   @if($loaiHinhDaoTao->khong_chinh_quy == 0) checked
                                                   @endif  value="0">Không
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">Từ xa</div>
                                        <div class="yes">
                                            <input title="radio" type="radio" @if($loaiHinhDaoTao->tu_xa == 1) checked
                                                   @endif name="tu_xa" value="1">Có
                                        </div>
                                        <div class="no">
                                            <input title="radio" type="radio" @if($loaiHinhDaoTao->tu_xa == 0) checked
                                                   @endif name="tu_xa" value="0">Không
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">Liên kết đào tạo với nước ngoài</div>
                                        <div class="yes">
                                            <input title="radio" type="radio" name="lien_ket_nuoc_ngoai"
                                                   @if($loaiHinhDaoTao->lien_ket_nuoc_ngoai == 1) checked
                                                   @endif  value="1">Có
                                        </div>
                                        <div class="no">
                                            <input title="radio" type="radio" name="lien_ket_nuoc_ngoai"
                                                   @if($loaiHinhDaoTao->lien_ket_nuoc_ngoai == 0) checked
                                                   @endif  value="0">Không
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">Liên kết đào tạo trong nước</div>
                                        <div class="yes">
                                            <input title="radio" type="radio" name="lien_ket_trong_nuoc"
                                                   @if($loaiHinhDaoTao->lien_ket_trong_nuoc == 1) checked
                                                   @endif  value="1">Có
                                        </div>
                                        <div class="no">
                                            <input title="radio" type="radio" name="lien_ket_trong_nuoc"
                                                   @if($loaiHinhDaoTao->lien_ket_trong_nuoc == 0) checked
                                                   @endif  value="0">Không
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">Các loại hình đào tạo khác (nếu có, ghi rõ từng loại
                                            hình):
                                        </div>
                                        <input title="tong so khoa" type="text" id="khac" name="khac"
                                               value="{{$loaiHinhDaoTao->khac}}"
                                               style="display: block;width: 70%;" readonly>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div style="text-align: right">
                            <button type="button" data-edit="1" class="btn btn-success" onclick="setData(this)">
                                Thực hiện chỉnh sửa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        function setData(obj) {
            let button = $(obj);
            if (button.attr('data-edit') == 1) {
                button.text('Cập nhâp');
                button.attr('data-edit', 0);
                $('input').removeAttr('readonly');
            } else if (button.attr('data-edit') == 0) {
                button.text('Thực hiện chỉnh sửa');
                button.attr('data-edit', 1);
                let data = {
                    chinh_quy: $('input[name="chinh_quy"]:checked').val(),
                    khong_chinh_quy: $('input[name="khong_chinh_quy"]:checked').val(),
                    tu_xa: $('input[name="tu_xa"]:checked').val(),
                    lien_ket_nuoc_ngoai: $('input[name="lien_ket_nuoc_ngoai"]:checked').val(),
                    lien_ket_trong_nuoc: $('input[name="lien_ket_trong_nuoc"]:checked').val(),
                    khac: $('#khac').val(),
                    dao_tao_tien_sy: $('#dao_tao_tien_sy').val(),
                    dao_tao_thac_sy: $('#dao_tao_thac_sy').val(),
                    dao_tao_dai_hoc: $('#dao_tao_dai_hoc').val(),
                    dao_tao_cao_dang: $('#dao_tao_cao_dang').val(),
                    dao_tao_tccn: $('#dao_tao_tccn').val(),
                    dao_tao_nghe: $('#dao_tao_nghe').val(),
                    dao_tao_khac: $('#dao_tao_khac').val(),
                    tong_so_cac_khoa: $('#tong_so_cac_khoa').val(),
                    _token: '{{csrf_token()}}'
                };
                $('input').attr('readonly', true);
                $.post('{{route('university.training.postCreate', ['slug'=>$slug,'daoTao'=>$daoTao->id])}}',
                    data, function (result) {
                        demo.showNotification('top', 'right', 'success', 'Chỉnh sửa thành công');
                    }).fail(function (errors) {
                    demo.showNotification('top', 'right', 'danger', 'Có lỗi xảy ra. Xin mời tạo lại');
                });
            }
        }
    </script>
@endsection