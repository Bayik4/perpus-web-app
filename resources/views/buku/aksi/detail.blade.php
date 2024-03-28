@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold mt-2">DETAIL BUKU</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('buku') }}">Data Buku</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        @foreach ($detailBuku as $data)
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('buku') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                    <button class="btn btn-sm btn-warning" title="hapus pasif"><i class="fas fa-trash-alt"
                            onclick="aksiData('{{ $data->id }}', 'pasif')"></i></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3" style="text-align: center;">
                            <img width="230" src="{{ asset('storage/buku_img/' . $data->sampul) }}" alt=""
                                srcset="">
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <b>{{ $data->kode_buku }}/{{ $data->rak->nomor_rak }}</b>
                                </li>
                                <li class="list-group-item">{{ $data->judul_buku }}
                                </li>
                                <li class="list-group-item">{{ $data->jenis_buku }}
                                </li>
                                <li class="list-group-item">{{ $data->penulis }}</li>
                                <li class="list-group-item">{{ $data->penerbit }}</li>
                                <li class="list-group-item">{{ $data->cetakan }}</li>
                                <li class="list-group-item">{{ $data->tebal_buku }},
                                    {{ $data->dimensi_buku }}</li>
                                <li class="list-group-item">{{ $data->isbn }}</li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $data->sinopsis }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form action="{{ url('/buku') }}" method="post" id="formpasif{{ $data->id }}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="val" value="{{ $data->id }}">
                        <input type="hidden" name="aksi" value="pasif">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        const aksiData = (id, aksi) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.value) {
                    switch (aksi) {
                        case 'pasif':
                            // alert(document.querySelector('#val').value)
                            document.getElementById('formpasif' + id).submit();
                            break;
                        case 'restore':
                            break;
                        case 'hapuspermanen':
                            break;
                    }
                }
            });
        }
    </script>
@endsection
