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
            <a href="{{ route('anggota.index') }}">Anggota</a> /
            <a href="#">Tambah</a>
        </div>
      <h1>Tambah Anggota</h1>
      <form method="POST" action="{{ route('anggota.store') }}">
        @csrf
        <div class="form-container">
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon:</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
          </div>
          <div class="form-group">
            <label for="tanggal_bergabung">Tanggal Bergabung:</label>
            <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
          </div>
          <div class="button-container">
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary" id="cancel-button">Batal</a>
            <button type="submit" class="btn btn-primary" formaction="{{ route('anggota.index') }}">Simpan</button>
          </div>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.getElementById("cancel-button").addEventListener("click", function (event) {
        event.preventDefault();
        Swal.fire({
          title: "Konfirmasi",
          text: "Apakah anda yakin batal menambah anggota?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          icon: 'warning'
        }).then((result) => {
          if (result.isConfirmed) {
            // Handle cancellation logic here if confirmed
            window.location.href = "{{ route('anggota.index') }}";
          }
        });
      });
    </script>
  </body>
</html>