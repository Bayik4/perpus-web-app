@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">DATA MEMBER</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item">Data Member</li>
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
                        <a href="{{ url('member') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datamemberpasif as $dmp)
                                    <tr style="text-align: center;">
                                        <th>
                                            {{ $no++ }}
                                        </th>
                                        <td>
                                            {{ $dmp->nama }}
                                        </td>
                                        <td>
                                            {{ $dmp->email }}
                                        </td>
                                        <td>
                                            {{ $dmp->gender->gender }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-success"
                                                onclick="aksiData('{{ $dmp->id }}', 'restore')"><i
                                                    class="fas fa-recycle"></i></button> |
                                            <button class="btn btn-sm btn-danger"
                                                onclick="aksiData('{{ $dmp->id }}', 'permanen')"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <form action="{{ url('member') }}" method="post" id="formrestore{{ $dmp->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $dmp->id }}">
                                        <input type="hidden" name="aksi" value="restore">
                                    </form>
                                    <form action="{{ url('member') }}" method="post" id="formdelete{{ $dmp->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $dmp->id }}">
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

@section('plugins.Sweetalert2', true);

@section('js')
    <script>
        const aksiData = (id, aksi) => {
            switch (aksi) {
                case 'restore':
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
