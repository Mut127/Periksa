<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pengaduans.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                           

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NIM</label>
                                <input type="text" class="form-control @error('NIM') is-invalid @enderror" name="NIM" value="{{ old('NIM') }}" placeholder="Masukkan NIM">
                            
                                <!-- error message untuk title -->
                                @error('NIM')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PENGADUAN</label>
                                <textarea class="form-control @error('pengaduan') is-invalid @enderror" name="pengaduan" rows="5" placeholder="Masukkan Pengaduan">{{ old('pengaduan') }}</textarea>
                            
                                <!-- error message untuk description -->
                                @error('pengaduan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            
                                <!-- error message untuk image -->
                                @error('foto')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                            <label class="font-weight-bold">STATUS</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>

                        <!-- error message untuk status -->
                        @error('status')
                        <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                          
                <div class="form-group mb-3">
                                <label class="font-weight-bold">CREATED_AT</label>
                                <input type="date" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value=" {{old('created_at') }}"></input>
                            
                                <!-- error message untuk description -->
                                @error('created_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">updated_AT</label>
                                <input type="date" class="form-control @error('updated_a') is-invalid @enderror" name="updated_at" value="{{ old('updated_at') }}">
                            
                                <!-- error message untuk nama -->
                                @error('updated_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>