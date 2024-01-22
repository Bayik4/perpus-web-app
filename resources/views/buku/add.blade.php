<!doctype html>   
<html lang="en">   
<head>   
 <meta charset="utf-8">   
 <meta name="viewport" content="width=device-width, initial-scale=1">   
 <title>Tambah Data Buku Baru</title>   
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">   
</head>   
<body>  
    <form method="post" action="{{ url('buku/save') }}">  
        @csrf  
        <div class="container-fluid">  
          <div class="row">  
            <div class="col-12 d-flex justify-content-center">  
              <div class="card text-bg-light mb-3" style="width: 400px; margin-top:100px;">  
                <div class="card-header bg-primary text-white">TAMBAH DATA BUKU</div>  
                <div class="card-body">  
                  <div class="mb-3">  
                    <label for="nomor_buku" class="form-label text-primary @error('nomor_buku') text-danger @enderror" >Nomor Buku</label>  
                    <input type="number" class="form-control @error('nomor_buku') is-invalid @enderror" id="nomor_buku" name="nomor_buku" value="{{ old('nomor_buku') }}">  
                    @error('nomor_buku')  
                        <small class="text-danger">{{ $message }}</small>  
                    @enderror  
                  </div>  
                  <div class="mb-3">  
                    <label for="judul_buku" class="form-label text-primary @error('judul_buku') text-danger @enderror" >Judul Buku</label>  
                    <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}">  
                    @error('judul_buku')
                        <small class="text-danger">{{ $message }}</small>  
                    @enderror  
                  </div>  
                  <div class="mb-3">  
                    <label for="jenis_buku" class="form-label text-primary @error('jenis_buku') text-danger @enderror" >Jenis Buku</label>  
                    <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" id="jenis_buku" name="jenis_buku" value="{{ old('jenis_buku') }}">
                    @error('jenis_buku')  
                        <small class="text-danger">{{ $message }}</small>  
                    @enderror  
                  </div>  
                  <div class="mb-3">  
                    <label for="nomor_rak" class="text-primary @error('nomor_rak') text-danger @enderror">Nomor Rak</label>
                    <select class="form-control @error('nomor_rak') is-invalid @enderror" name="nomor_rak" id="nomor_rak">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> 
                    @error('nomor_rak')  
                        <small class="text-danger">{{ $message }}</small>  
                    @enderror  
                  </div>  
                </div>  
                <div class="card-footer text-center">  
                  <button type="submit" class="btn btn-primary btn-sm">Save</button>  
                  <button type="reset" class="btn btn-danger btn-sm">Cancel</button>  
                </div>  
              </div>  
            </div>  
          </div>  
        </div>  
      </form> 

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>   
</html>   
