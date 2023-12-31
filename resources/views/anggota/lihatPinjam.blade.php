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
            <a href="{{ route('home') }}">Home</a> /
            <a href="#">Peminjaman</a>
        </div>
        <h1>Lihat Peminjaman</h1>
        <br>
        <div class="row mb-1">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari peminjaman...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="searchButton" type="button">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('anggota.createPeminjaman') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <br>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Judul Buku</th>
                    <th class="text-center">Tanggal Peminjaman</th>
                    <th class="text-center">Tanggal Pengembalian</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                    <tr>
                        <td class="text-center">{{ $peminjaman->buku->judul }}</td>
                        <td class="text-center">{{ $peminjaman->tanggal_peminjaman }}</td>
                        <td class="text-center">{{ $peminjaman->tanggal_pengembalian }}</td>
                        <td class="text-center">{{ $peminjaman->status}}</td>
                    </tr>
                @endforeach

                @if ($peminjamans->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data peminjaman</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
</body>
</html>