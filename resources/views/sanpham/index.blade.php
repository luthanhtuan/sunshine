@extends('backend.layouts.index')

@section('title')
Danh sach san pham
@endsection

@section('main-content')
<h2>Danh sách sản phẩm</h2>
<table border="1">
    <thead>
        <tr> 
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá gốc</td>
            <td>Giá bán</td>
            <td>Hình</td>
            <td>Thông tin</td>
            <td>Đánh giá</td>
            <td>Trạng thái</td>
            <td>Loại sản phẩm</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten }}</td>
                <td>{{ $sanpham->sp_giaGoc }}</td>
                <td>{{ $sanpham->sp_giaBan }}</td>
                <td>{{ $sanpham->sp_hinh }}</td>
                <td>{{ $sanpham->sp_thongTin }}</td>
                <td>{{ $sanpham->sp_danhGia }}</td>
                <td>{{ $sanpham->sp_trangThai }}</td>
                <td>{{ $sanpham->loai->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection