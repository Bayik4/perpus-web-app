@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h4 class="font-weight-bold mt-2">TAMBAH DATA BUKU</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('buku') }}">Data Buku</a></li>
                <li class="breadcrumb-item active">Tambah Data Buku</li>
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
                        <a href="{{ url('buku') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i> Kembali</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ url('buku/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-gorup">
                                        <label for="kode_buku">Kode buku<span>*</span></label>
                                        <input type="text" name="kode_buku" id="kode_buku" class="form-control"
                                            placeholder="Masukkan kode buku">
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile">Sampul buku</label>
                                        <input class="form-control" type="file" id="formFile" name="sampul">
                                    </div>
                                    <div class="form-gorup" style="margin-top: -15px;">
                                        <label for="judul_buku">Judul buku<span>*</span></label>
                                        <input type="text" name="judul_buku" id="judul_buku" class="form-control"
                                            placeholder="Masukkan judul buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="jenis_buku">Jenis buku</label>
                                        <input type="text" name="jenis_buku" id="jenis_buku" class="form-control"
                                            placeholder="Masukkan jenis buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="penulis">Penulis buku<span>*</span></label>
                                        <input type="text" name="penulis" id="penulis" class="form-control"
                                            placeholder="Masukkan penulis buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="penerbit">Penerbit buku<span>*</span></label>
                                        <input type="text" name="penerbit" id="penerbit" class="form-control"
                                            placeholder="Masukkan penerbit buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="cetakan">Cetakan buku</label>
                                        <input type="text" name="cetakan" id="cetakan" class="form-control"
                                            placeholder="Masukkan cetakan buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-gorup">
                                        <label for="tebal_buku">Tebal buku</label>
                                        <input type="text" name="tebal_buku" id="tebal_buku" class="form-control"
                                            placeholder="Masukkan tebal buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="dimensi_buku">Dimensi buku</label>
                                        <input type="text" name="dimensi_buku" id="dimensi_buku" class="form-control"
                                            placeholder="Masukkan dimensi buku">
                                    </div>
                                    <div class="form-gorup">
                                        <label for="isbn">ISBN buku<span>*</span></label>
                                        <input type="text" name="isbn" id="isbn" class="form-control"
                                            placeholder="Masukkan ISBN buku">
                                    </div>
                                    <div class="form-group">
                                        <label for="rak_id">Nomor rak<span>*</span></label>
                                        <select name="rak_id" id="rak_id" class="form-control">
                                            @foreach ($dtrak as $dt)
                                                <option value="{{ $dt->id }}">
                                                    {{ $dt->nomor_rak }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-top: -15px;">
                                        <label for="jumlah_buku">Jumlah Buku</label>
                                        <input type="number" class="form-control" name="jumlah_buku">
                                    </div>
                                    <div class="form-group" style="margin-top: -15px;">
                                        <label for="sinopsis">Sinopsis buku</label>
                                        <textarea name="sinopsis" id="siopsis" class="form-control" cols="30" rows="4"
                                            placeholder="Masukkan sinopsis buku"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: end;">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
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

        .card-body .requ span {
            color: red;
        }
    </style>
@endsection
