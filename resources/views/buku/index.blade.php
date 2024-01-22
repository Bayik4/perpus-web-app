<!doctype html>  
<html lang="en">  
 <head>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Data Buku</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>  
 <body>  
    <div class="container"> 
        <div class="row">
            <div class="col">
                <a href="{{url('buku/create')}}" class="btn btn-sm btn-primary mt-4 mb-2">  
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Buku Baru   
                </a> 
                <div class="card">
                    <div class="card-header">
                        <h2>Data Buku Aktif</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped">  
                            <thead>  
                                <tr>  
                                    <th style="text-align: right;">#</th>  
                                    <th>Nomor Buku</th>
                                    <th>Judul Buku</th>  
                                    <th>Jenis Buku</th>  
                                    <th>Nomor Rak</th>
                                </tr>  
                            </thead>  
                            <tbody>  
                                @foreach ($databukuaktif as $dba)  
                                <tr>  
                                    <th>  
                                        {{ $dba->id }}  
                                    </th>  
                                    <td>  
                                        {{ $dba->nomor_buku }}      
                                    </td>  
                                    <td>
                                        {{ $dba->judul_buku }}
                                    </td>  
                                    <td>  
                                        {{ $dba->jenis_buku }}  
                                    </td>  
                                    <td>  
                                        {{ $dba->nomor_rak }}  
                                    </td>  
                                </tr>  
                                @endforeach  
                            </tbody>  
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Data Buku Pasif</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-condensed table-striped">  
                            <thead>  
                                <tr>  
                                    <th style="text-align: right;">#</th>  
                                    <th>Nomor Buku</th>
                                    <th>Judul Buku</th>  
                                    <th>Jenis Buku</th>  
                                    <th>Nomor Rak</th>
                                </tr>  
                            </thead>  
                            <tbody>  
                                @foreach ($databukupasif as $dbp)  
                                <tr>  
                                    <th>  
                                        {{ $dbp->id }}  
                                    </th>  
                                    <td>  
                                        {{ $dbp->nomor_buku }}  
                                    </td>  
                                    <td>
                                        {{ $dbp->judul_buku }}
                                    </td>  
                                    <td>  
                                        {{ $dbp->jenis_buku }}  
                                    </td>  
                                    <td>  
                                        {{ $dbp->nomor_rak }}  
                                    </td>  
                                </tr>  
                                @endforeach  
                            </tbody>  
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
 </body>  
</html>  