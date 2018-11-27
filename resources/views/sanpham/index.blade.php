@extends('backend.layouts.index')

@section('title')
Danh sach san pham
@endsection

@section('main-content')
<h2>Danh sách sản phẩm</h2>
<a href="{{ route('danhsachsanpham.create')}}" class="btn btn-success">Thêm</a>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-'.$msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}} <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a></p>
        @endif
    @endforeach
</div>
<table class="table">
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
                <td><a href="{{ route('danhsachsanpham.edit', ['id' => $sanpham->sp_ma])}}" class="btn btn-primary pull-left">Sửa</a></td>
                <td>
                    <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => $sanpham->sp_ma]) }}" class="pull-left">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xoa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection