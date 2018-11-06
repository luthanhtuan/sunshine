<h2>Danh sach chu de</h2>
<table border="1">
    <thead>
        <tr> 
            <td>Ma</td>
            <td>Ten</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachchude as $chude)
            <tr>
                <td>{{ $chude->cd_ma }}</td>
                <td>{{ $chude->cd_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>