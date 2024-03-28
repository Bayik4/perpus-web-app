@extends('adminlte::page')
@section('content_header')
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold mt-2">DATA BUKU</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Buku</li>
            </ol>
        </nav>
    </div>
@endsection

@section('plugins.Datatables', true)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="container" style="text-align: end;">
                            <a href="{{ url('buku/create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Buku
                            </a>
                            <a href="{{ url('buku_pasif') }}" class="btn btn-sm btn-outline-primary">
                                Data Pasif
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped" id="tabelbuku">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>No </th>
                                    {{-- <th>Sampul Buku</th> --}}
                                    <th>Kode Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Nomor Rak</th>
                                    <th>Jumlah Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($databukuaktif as $dba)
                                    <tr style="text-align: center;">
                                        <th style="text-align: right;">
                                            {{ $no++ }}
                                        </th>
                                        <td>
                                            {{ $dba->kode_buku }}
                                        </td>
                                        <td>
                                            {{ $dba->judul_buku }}
                                        </td>
                                        <td>
                                            {{ $dba->rak->nomor_rak }}
                                        </td>
                                        <td>
                                            {{ $dba->jumlah_buku }}
                                        </td>
                                        <td class="aksi">
                                            <a href="{{ url('/buku') }}/{{ $dba->id }}/edit"
                                                class="btn btn-sm btn-success" title="edit"><i
                                                    class="fas fa-edit"></i></a> |
                                            {{-- <button class="btn btn-sm btn-warning" title="hapus pasif"
                                                onclick="aksiData('{{ $dba->id }}', 'pasif')"><i
                                                    class="fas fa-trash-alt"></i></button> | --}}
                                            <a href="{{ url('buku/detail') }}/{{ $dba->id }}"
                                                class="btn btn-sm btn-info" title="detail"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>
                                    <form action="{{ url('/buku') }}" method="post" id="formpasif{{ $dba->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" id="val" value="{{ $dba->id }}">
                                        <input type="hidden" name="aksi" value="pasif">
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
        @if (session('pesansukses'))
            let msg = @json(session()->pull('pesansukses'));
            Swal.fire({
                title: "Sukses!",
                text: msg,
                icon: "success",
            });
        @endif
        @if (session('pesangagal'))
            let msg = @json(session()->pull('pesangagal'));
            Swal.fire({
                title: "Gagal!",
                text: msg,
                icon: "failed",
            });
        @endif

        // const aksiData = (id, aksi) => {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!",
        //     }).then((result) => {
        //         if (result.value) {
        //             switch (aksi) {
        //                 case 'pasif':
        //                     // alert(document.querySelector('#val').value)
        //                     document.getElementById('formpasif' + id).submit();
        //                     break;
        //                 case 'restore':
        //                     break;
        //                 case 'hapuspermanen':
        //                     break;
        //             }
        //         }
        //     });
        // }

        $('#tabelbuku').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endsection

@section('css')
    <style>
        .aksi {
            text-align: center;
        }
    </style>
@endsection
