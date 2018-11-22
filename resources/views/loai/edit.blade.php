@extends('backend.layouts.index')

@section('title')
Hieu chinh loai san pham
@endsection

@section('main-content')

<h2>Hieu chinh loai san pham</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="frmThemMoiLoaiSanPham" method="post" action="{{ route('danhsachloai.update', ['id' => $loai->l_ma])}}">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Nhap ten loai</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ $loai->l_ten }}" placeholder="Nhap ten">
    </div>
    <div class="form-group">
        <label for="l_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="l_taoMoi" name="l_taoMoi" value="{{ $loai->l_taoMoi }}" placeholder="Nhap ngay tao moi">
    </div>
    <div class="form-group">
        <label for="l_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-control" id="l_capNhat" name="l_capNhat" value="{{ $loai->l_capNhat }}" placeholder="Nhap ngay cap nhat">
    </div>
    <div class="form-group">
        <label for="l_trangThai">Trang thai</label>
        <select name="l_trangThai">
            <option value="1" {{ $loai->l_trangThai == 1 ? "selected" : ""}}>Khoa</option>
            <option value="2" {{ $loai->l_trangThai == 1 ? "selected" : ""}}>Kha dung</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Luu tru</button>
</form>
@endsection