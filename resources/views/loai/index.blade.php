Danh sach loai
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