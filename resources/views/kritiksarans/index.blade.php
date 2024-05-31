<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kritik Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PERIKSA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kritik & Saran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('kritiksarans.create') }}" class="btn btn-md btn-success mb-3">ADD KRITIK SARAN</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">KRITIK & SARAN</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($kritiksarans as $kritiksaran)
                                
                                    <tr>
                                    
                                    <td>{{ $loop->iteration + ($kritiksarans->currentPage() - 1) * $kritiksarans->perPage() }}</td>
                                        <td>{{ $kritiksaran->NIM }}</td>
                                        <td>{{ $kritiksaran->nama}}</td>
                                        <td>{{ $kritiksaran->kritiksaran }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kritiksarans.destroy', $kritiksaran->id) }}" method="POST">
                                                <a href="{{ route('kritiksarans.show', $kritiksaran->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('kritiksarans.edit', $kritiksaran->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Kritik Saran belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $kritiksarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>