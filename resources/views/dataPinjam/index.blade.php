@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">DATA PINJAM</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Pinjam</li>
            </ol>
        </nav>
    </div>
@endsection

@section('plugins.Datatables', true)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-bordered table-condensed table-striped" id="tabeldatapinjam">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>ID Member</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Dipinjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr style="text-align: center;">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->member->id }}</td>
                                <td>{{ $item->member->nama }}</td>
                                <td>{{ $item->buku->judul_buku }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->jumlah_dipinjam }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-recycle"
                                            onclick="aksiData('{{ $item->id }}')"></i></button>
                                    {{-- <a href="" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a> --}}
                                </td>
                            </tr>
                            <form action="{{ url('datapinjam') }}" method="post" id="formhapus{{ $item->id }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                <input type="hidden" name="buku_id" value="{{ $item->buku->id }}">
                                <input type="hidden" name="jumlah_buku" value="{{ $item->jumlah_dipinjam }}">
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        // $('#tabeldatapinjam').DataTable({
        //     "paging": true,
        //     "lengthChange": true,
        //     "searching": true,
        //     "ordering": false,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });

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

        const aksiData = (id) => {
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
                    document.querySelector('#formhapus' + id).submit();
                }
            });
        }
    </script>
@endsection
