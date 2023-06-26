<!DOCTYPE html>
<html>
<head>
    <title>Lihat Peminjaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
      body {
        margin: 20px;
        background-color: #f8f9fa;
      }

      /* Header style */
      h1 {
        color: #ff6f00;
        margin-top: 20px;
        margin-bottom: 30px;
        text-align: center;
      }

      /* Link style */
      .breadcrumb a {
        color: #ff6f00;
        text-decoration: none;
      }

      /* Form container */
      .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
      }

      /* Form field labels */
      .form-group label {
        font-weight: bold;
        color: #333;
      }

      /* Submit button style */
      .btn-primary {
        background-color: #ff6f00;
        border-color: #ff6f00;
        width: 100px;
      }

      /* Cancel button style */
      .btn-secondary {
        background-color: #444;
        border-color: #444;
        width: 100px;
      }

      /* Button container style */
      .button-container {
        margin-top: 20px;
        text-align: right;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Dashboard</a> /
            <a href="{{ route('buku.index') }}">Anggota</a> /
            <a href="#">Lihat Peminjaman</a>
        </div>
        <h1>Lihat Peminjaman</h1>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <a href="{{ route('dashboard') }}">Dashboard/</a>
                        <a href="{{ route('anggota.index') }}">Anggota</a>
                        <h1>Tambah Anggota</h1>
                    </div>
                    <div class="col-md-6">
                        <!-- Tambahkan search bar di sini -->
                        <form action="{{ route('anggota.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari anggota..." name="search" value="{{ request()->input('search') }}" id="searchInput">
                                <input type="hidden" name="filter" value="{{ request()->input('filter') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Nomor Telepon</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($anggotas as $anggota)
                                    <tr>
                                        <td class="text-center">{{ $anggota->id_anggota }}</td>
                                        <td class="text-center">{{ $anggota->nama }}</td>
                                        <td class="text-center">{{ $anggota->nomor_telepon }}</td>
                                        <td class="text-center">{{ $anggota->email }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}" class="btn btn-info">Detail</a>
                                            </div>
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
        @include('layouts.footers.auth.footer')
    </div>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var input, filter, table, tr, td, i, txtValue;
                input = $(this).val();
                filter = input.toLowerCase();
                table = $("table");
                tr = table.find('tbody tr'); // Ubah hanya mencari tr di dalam tbody
                tr.each(function() {
                    var match = false;
                    $(this)
                        .find('td')
                        .each(function() {
                            td = $(this);
                            if (td) {
                                txtValue = td
                                    .text()
                                    .toLowerCase();
                                if (txtValue.indexOf(filter) > -1) {
                                    match = true;
                                    return false; // Berhenti perulangan saat ada kecocokan
                                }
                            }
                        });
                    if (match) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>  
@endsection
