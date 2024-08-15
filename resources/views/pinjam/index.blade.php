@extends('adminlte::page')
@section('content_header')
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">HALAMAN PINJAM</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Borrow Page</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        {{-- <form class="form" action=""> --}}
                        <p style="font-weight: bold;">Cari buku :</p>
                        <div class="form-group d-flex">
                            <input type="text" name="search" class="form-control mr-2"
                                placeholder="Masukkan kode/judul buku" id="search" autocomplete="off">
                        </div>
                        {{-- </form> --}}
                        <div class="container" style="height: 250px; overflow-y: scroll;">
                            <div id="search-list"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- <form class="form" action=""> --}}
                        <p style="font-weight: bold;">Cari member :</p>
                        <div class="form-group d-flex">
                            <input type="text" name="searchm" class="form-control mr-2 d-inline"
                                placeholder="Masukkan id/nama member" id="searchm" autocomplete="off">
                        </div>
                        {{-- </form> --}}
                        <div class="container" style="height: 250px; overflow-y: scroll;">
                            <div id="search-listm"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <form action="{{ url('pinjam/save') }}" method="POST">
                                @csrf
                                <div class="in-con d-flex align-items-end justify-content-around" style="width: 700px;">
                                    <div class="in-buku">
                                        <p>Judul Buku :</p>
                                        <input type="hidden" class="pinjam" id="buku" name="buku_id" readonly>
                                        <input type="text" class="pinjam" id="judul_buku" readonly>
                                    </div>
                                    <div class="in-member">
                                        <p>Nama Member :</p>
                                        <input type="hidden" class="pinjam" id="member" name="member_id" readonly>
                                        <input type="text" class="pinjam" id="member_name" readonly>
                                    </div>
                                    <div class="in-tanggal">
                                        <p>Tanggal Kembali :</p>
                                        <input type="date" class="pinjam" name="tanggal_kembali" style="width: 140px;"
                                            required>
                                    </div>
                                    <div class="in-user">
                                        <p>Nama Petugas :</p>
                                        <input type="hidden" class="pinjam" name="user_id" value="{{ $user->id }}"
                                            readonly>
                                        <input type="text" class="pinjam" value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="in-jumlah">
                                        <p>Jumlah Buku</p>
                                        <input type="number" class="pinjam" name="jumlah_buku" min="1"
                                            max="10">
                                    </div>
                                    <button type="submit" class="btn btn-xl btn-success">Sumbit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins.Sweetalert2', true)

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#search').on('keyup', function() {
            var query = $(this).val();

            if (query != "") {
                $.ajax({
                    type: "GET",
                    url: "search",
                    data: {
                        'search': query
                    },
                    success: function(response) {
                        $('#search-list').html(response);
                    }
                });
            }
        });

        $('#searchm').on('keyup', function() {
            var query = $(this).val();

            if (query != "") {
                $.ajax({
                    type: "GET",
                    url: "searchm",
                    data: {
                        'searchm': query
                    },
                    success: function(response) {
                        $('#search-listm').html(response);
                    }
                });
            }
        });



        const aksi = (id, judul_buku) => {
            document.querySelector('#buku').value = id;
            document.querySelector('#judul_buku').value = judul_buku;
        }

        const aksim = (id, name) => {
            document.querySelector('#member').value = id;
            document.querySelector('#member_name').value = name;
        }

        @if (session('pesansukses'))
            let msg = @json(session()->pull('pesansukses'));
            Swal.fire({
                title: "Sukses!",
                text: msg,
                icon: "success"
            });
        @endif
        @if (session('pesangagal'))
            let msg = @json(session()->pull('pesangagal'));
            Swal.fire({
                title: "Gagal!",
                text: msg,
                icon: "error"
            });
        @endif
    </script>
@endsection

@section('css')
    <style>
        .pinjam {
            outline: none;
            border: none;
            width: 100px;
            border-radius: 5px;
            box-shadow: inset 1px 1px 2px 1px black;
            padding: 0px 8px;
        }

        .in-con p {
            margin-bottom: 2px;
        }
    </style>
@endsection
