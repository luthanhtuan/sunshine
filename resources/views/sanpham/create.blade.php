@extends('backend.layouts.index')

@section('title')
Them moi san pham
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')

<h2>Them moi loai san pham</h2>

<form method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loai san pham</label>
        <select name="l_ma">
            @foreach ($danhsachloai as $loai)
                <option value=" {{ $loai->l_ma}}">{{ $loai->l_ten}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên sản phầm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Ten">
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá gốc</label>
        <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Gia goc">
    </div>
    <div class="form-group">
        <label for="sp_giaBan">Giá gốc</label>
        <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" placeholder="Gia ban">
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
        <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" placeholder="Thông tin">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
        <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" placeholder="Đánh giá">
    </div>
    <div class="form-group">
        <label for="sp_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" placeholder="Nhap ngay tao moi">
    </div>
    <div class="form-group">
        <label for="sp_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" placeholder="Nhap ngay cap nhat">
    </div>
    <div class="form-group">
        <label for="sp_trangThai">Trang thai</label>
        <select name="sp_trangThai">
            <option value="1">Khoa</option>
            <option value="2">Kha dung</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Luu tru</button>
</form>
@endsection
@section('custom-scripts')
<!-- các scripts dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js')}}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js')}}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js')}}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js')}}"
type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: 'btn btn-primary btn-lg',
            fileType: "any",
            previewFileIcon: "i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>
@endsection