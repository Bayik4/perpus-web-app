<style>
    table, th, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
<div>
    <table>
        <tr>
            <th>Nomor Buku</th>
            <th>Judul Buku</th>
        </tr>
        @foreach ($databuku as $buku)
        <tr>
            <td> {{ $buku->nomor_buku }} </td>
            <td> {{ $buku->judul_buku }} </td>
        </tr>
        @endforeach
    </table>
</div>
