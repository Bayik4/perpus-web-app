@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h4 class="font-weight-bold mt-2">EDIT DATA BUKU</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('buku') }}">Data Buku</a></li>
                <li class="breadcrumb-item active">Edit Data Buku</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    {{-- <div class="card-header">
                    </div> --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($dtedit as $data)
                        <form action="{{ url('buku') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img width="250" src="{{ asset('storage/buku_img/' . $data->sampul) }}"
                                                alt="" srcset="">
                                            <input type="hidden" name="sampulLama" class="form-control"
                                                value="{{ $data->sampul }}">
                                            <label for="formFile">Sampul
                                                buku</label>
                                            <input class="form-control" type="file" id="formFile" name="sampul">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <div class="form-group">
                                                <label for="kode_buku">Kode buku</label>
                                                <input type="text" class="form-control" id="kode_buku" name="kode_buku"
                                                    value="{{ $data->kode_buku }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul_buku">Judul buku</label>
                                                <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                                                    value="{{ $data->judul_buku }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_buku">Jenis buku</label>
                                                <input type="text" class="form-control" id="jenis_buku" name="jenis_buku"
                                                    value="{{ $data->jenis_buku }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="penulis">Penulis buku</label>
                                                <input type="text" class="form-control" id="penulis" name="penulis"
                                                    value="{{ $data->penulis }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit buku</label>
                                                <input type="text" class="form-control" id="penerbit" name="penerbit"
                                                    value="{{ $data->penerbit }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="cetakan">Cetakan buku</label>
                                                <input type="text" class="form-control" id="cetakan" name="cetakan"
                                                    value="{{ $data->cetakan }}">
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tebal_buku">Tebal buku</label>
                                            <input type="text" class="form-control" id="tebal_buku" name="tebal_buku"
                                                value="{{ $data->tebal_buku }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="dimensi_buku">Dimensi buku</label>
                                            <input type="text" class="form-control" id="dimensi_buku" name="dimensi_buku"
                                                value="{{ $data->dimensi_buku }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">ISBN buku</label>
                                            <input type="text" class="form-control" id="isbn" name="isbn"
                                                value="{{ $data->isbn }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="rak_id">Nomor rak</label>
                                            <select name="rak_id" id="rak_id" class="form-control">
                                                <option value="{{ $data->rak_id }}">
                                                    {{ $data->rak->nomor_rak }}</option>
                                                @foreach ($dtrak as $dt)
                                                    <option value="{{ $dt->id }}">
                                                        {{ $dt->nomor_rak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_buku">Jumlah Buku</label>
                                            <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control" value="{{ $data->jumlah_buku }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sinopsis">Sinopsis buku</label>
                                            <textarea name="sinopsis" class="form-control" id="sinopsis" cols="30" rows="5">{{ $data->sinopsis }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('buku') }}" class="btn btn-outline-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                </div>
                <!-- /.card-body -->

                </form>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

@section('css')
    <style>
        #formFile::-webkit-file-upload-button {
            padding: 5px;
            margin-top: -10px;
            margin-left: -12px;
            margin-right: 12px;
            color: gray;
            background-color: transparent;
            border: 1px solid gray;
            border-radius: 4px;
        }
    </style>
@endsection
