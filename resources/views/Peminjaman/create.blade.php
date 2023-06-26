<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
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
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a> /
            <a href="#">Tambah</a>
        </div>
      <h1>Tambah Peminjaman</h1>
      <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <div class="form-group">
          <label for="id_anggota">ID Anggota</label>
          <select class="form-control select2" id="id_anggota" name="id_anggota" required>
            <option value="" selected disabled>Masukkan ID</option>
            @foreach($anggotas as $anggota)
              <option value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="id_buku">ID Buku</label>
          <select class="form-control select2" id="id_buku" name="id_buku" required>
            <option value="" selected disabled>Masukkan ID</option>
            @foreach($bukus as $buku)
              <option value="{{ $buku->id_buku }}">{{ $buku->id_buku }} - {{ $buku->judul }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
          <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
        </div>
        <div class="form-group">
          <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
          <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status" required>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Tepat Waktu">Tepat Waktu</option>
            <option value="Terlambat">Terlambat</option>
          </select>
        </div>
        <div class="text-right">
          <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary" id="cancel-button">Batal</a>
          <button type="submit" class="btn btn-primary" formaction="{{ route('peminjaman.index') }}">Simpan</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.getElementById("cancel-button").addEventListener("click", function (event) {
        event.preventDefault();
        Swal.fire({
          title: "Konfirmasi",
          text: "Apakah anda yakin batal menambah buku?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          icon: 'warning'
        }).then((result) => {
          if (result.isConfirmed) {
            // Handle cancellation logic here if confirmed
            window.location.href = "{{ route('peminjaman.index') }}";
          }
        });
      });
    </script>
  </body>
</html>
