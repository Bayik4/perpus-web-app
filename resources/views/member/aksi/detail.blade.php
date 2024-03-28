@extends('adminlte::page')
@section('content_header')
    <div class="container d-flex align-items-center justify-content-between">
        <h2 class="font-weight-bold">DETAIL MEMBER</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item">Data Member</li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($dtmember as $dm)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('member') }}" class="btn btn-sm btn-md btn-primary"><i
                                    class="fa fa-arrow-left"></i>
                                Kembali</a>
                            <button class="btn btn-sm btn-warning" onclick="aksiData('{{ $dm->id }}', 'pasif')"><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-condensed table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>Nama</th>
                                        <th>Alamat Email</th>
                                        <th>Umur</th>
                                        <th>Jenis Kelamin</th>
                                        <th>alamat</th>
                                        <th>No Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center;">
                                        <td>
                                            {{ $dm->nama }}
                                        </td>
                                        <td>
                                            {{ $dm->email }}
                                        </td>
                                        <td>
                                            {{ $dm->umur }}
                                        </td>
                                        <td>
                                            {{ $dm->gender->gender }}
                                        </td>
                                        <td>
                                            {{ $dm->alamat }}
                                        </td>
                                        <td>
                                            {{ $dm->no_telp }}
                                        </td>
                                    </tr>
                                    <form action="{{ url('member') }}" method="post" id="formpasif{{ $dm->id }}">
                                        @csrf
                                        @method('delete')
                                        <input type="text" name="id" value="{{ $dm->id }}">
                                        <input type="text" name="aksi" value="pasif">
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
