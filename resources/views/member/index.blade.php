@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">DATA MEMBER</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Member</li>
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
                    <div class="card-header" style="text-align: right;">
                        <a href="{{ url('member/create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Tambah Member
                        </a>
                        <a href="{{ url('member_pasif') }}" class="btn btn-sm btn-outline-primary">
                            Data Pasif
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped" id="tabelmember">
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
                                @foreach ($datamemberaktif as $dbm)
                                    <tr style="text-align: center;">
                                        <th>
                                            {{ $no++ }}
                                        </th>
                                        <td>
                                            {{ $dbm->nama }}
                                        </td>
                                        <td>
                                            {{ $dbm->email }}
                                        </td>
                                        <td>
                                            {{ $dbm->gender->gender }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            | <a href="{{ url('member/detail') }}/{{ $dbm->id }}" type="button"
                                                class="btn btn-sm btn-primary" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            {{-- <a href="#" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-trash-alt"></i></a> --}}
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $dbm->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $dbm->id }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        $('#tabelmember').DataTable({
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
