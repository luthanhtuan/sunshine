@extends('backend.layouts.index')

@section('title')
Danh sach loai
@endsection

@section('main-content')
<a href="{{ route('danhsachloai.create')}}">Them loai moi</a>
<h2>Danh sach loai</h2>
<table border="1">
    <thead>
        <tr> 
            <td>Ma</td>
            <td>Ten</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection