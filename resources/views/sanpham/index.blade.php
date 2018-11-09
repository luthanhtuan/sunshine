@extends('backend.layouts.index')

@section('title')
Danh sach san pham
@endsection

@section('main-content')
<table border="1">
    <thead>
        <tr> 
            <td>Ma</td>
            <td>Ten</td>
            <td>Loai</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten }}</td>
                <!-- <td>{{ $sanpham->sp_giaGoc }}</td>
                <td>{{ $sanpham->sp_giaBan }}</td>
                <td>{{ $sanpham->sp_hinh }}</td>
                <td>{{ $sanpham->sp_thongTin }}</td>
                <td>{{ $sanpham->sp_danhGia }}</td>
                <td>{{ $sanpham->sp_taoMoi }}</td>
                <td>{{ $sanpham->sp_capNhat }}</td>
                <td>{{ $sanpham->sp_trangThai }}</td> -->
                <td>{{ $sanpham->loai->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection