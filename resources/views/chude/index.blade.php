
@extends('backend.layouts.index')

@section('title')
Danh sach chu de
@endsection

@section('main-content')
<h2>Danh sach chu de</h2>
<table border="1">
    <thead>
        <tr> 
            <td>Ma chu de</td>
            <td>Ten chu de</td>
            <td>Ngay tao moi</td>
            <td>Ngay cap nhat</td>
            <td>Trang thai</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachchude as $chude)
            <tr>
                <td>{{ $chude->cd_ma }}</td>
                <td>{{ $chude->cd_ten }}</td>
                <td>{{ $chude->cd_taoMoi }}</td>
                <td>{{ $chude->cd_capNhat }}</td>
                <td>{{ $chude->cd_trangThai }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection