@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold mt-2">DATA BUKU</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('buku') }}">Data Buku</a></li>
                <li class="breadcrumb-item active">Pasif</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('buku') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>No</th>
                                    <th>Nomor Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Sinopsis</th>
                                    <th>Nomor Rak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($databukupasif as $dbp)
                                    <tr style="text-align: center;">
                                        <th>
                                            {{ $no++ }}
                                        </th>
                                        <td>
                                            {{ $dbp->kode_buku }}
                                        </td>
                                        <td>
                                            {{ $dbp->judul_buku }}
                                        </td>
                                        <td>
                                            {{ $dbp->jenis_buku }}
                                        </td>
                                        <td>
                                            {{ $dbp->rak->nomor_rak }}
                                        </td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-sm btn-success" title="restore"
                                                onclick="aksiData('{{ $dbp->id }}', 'kembalikan')"><i
                                                    class="fas fa-recycle"></i></button> |
                                            <button class="btn btn-sm btn-danger" title="hapus permanen"
                                                onclick="aksiData('{{ $dbp->id }}', 'permanen')"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <form action="{{ url('/buku') }}" method="post" id="formrestore{{ $dbp->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $dbp->id }}">
                                        <input type="hidden" name="aksi" value="restore">
                                    </form>
                                    <form action="{{ url('/buku') }}" method="post" id="formdelete{{ $dbp->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $dbp->id }}">
                                        <input type="hidden" name="aksi" value="delete">
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        const aksiData = (id, aksi) => {
            switch (aksi) {
                case 'kembalikan':
                    Swal.fire({
                        title: "Are you sure?",
                        text: 'restore data',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.value) {
                            document.getElementById('formrestore' + id).submit();
                        }
                    });
                    break;
                case 'permanen':
                    Swal.fire({
                        title: "Are you sure?",
                        text: 'delete data',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.value) {
                            document.getElementById('formdelete' + id).submit();
                        }
                    });
                    break;
            }
        }
    </script>
@endsection
