<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Kritik Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kritiksarans.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NIM</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="NIM" value="{{ old('NIM') }}" placeholder="Masukkan NIM">
                            
                                <!-- error message untuk nim -->
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
                                <label class="font-weight-bold">KRITIK & SARAN</label>
                                <textarea class="form-control @error('kritiksaran') is-invalid @enderror" name="kritiksaran" rows="5" placeholder="Masukkan Kritik Saran Anda">{{ old('kritiksaran') }}</textarea>
                            
                                <!-- error message untuk kritiksaran -->
                                @error('kritiksaran')
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