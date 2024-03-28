@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">TAMBAH DATA MEMBER</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Data Member</li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ url('member/save') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('member') }}" class="btn btn-sm btn-md btn-primary"><i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        {{-- nama
                        alamat
                        umur
                        jenis_kelamin
                        email
                        no_telp --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            placeholder="Masukkan nama member">
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" id="umur" class="form-control" name="umur"
                                            placeholder="Masukkan umur member">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Masukkan email member">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender_id">Jenis Kelamin</label>
                                        <select name="gender_id" id="gender_id" class="form-control">
                                            @foreach ($dtgender as $dtg)
                                                <option value="{{ $dtg->id }}">{{ $dtg->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telpon</label>
                                        <input type="text" id="no_telp" class="form-control" name="no_telp"
                                            placeholder="Masukkan nomor telpon member">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="8" placeholder="Masukkan alamat"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
