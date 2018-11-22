@extends('backend.layouts.index')

@section('title')
Danh sach san pham
@endsection

@section('main-content')
<h2>Danh sách sản phẩm</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-'.$msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}} <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a></p>
        @endif
    @endforeach
</div>
<table border="1">
    <thead>
        <tr> 
            <td>Mã</td>
            <td>Tên</td>
            <td>Hình ảnh</td>
            <td>Thuộc loại</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten }}</td>
                <td><img src="{{ asset('storage/photos/' .$sanpham->sp_hinh) }}" class="img-list" /></td>
                <td>{{ $sanpham->loai->l_ten }}</td>
                <td><a href="{{ route('danhsachsanpham.edit', ['id' => $sanpham->sp_ma])}}">Sửa</a></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection