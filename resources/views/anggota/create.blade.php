<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
      body {
        margin: 20px;
      }
    </style
  </head>
  <body>
    <div class="container">
      <a href="{{ route('dashboard') }}">Dashboard/</a>
        <a href="{{ route('anggota.index') }}">Anggota/</a>
        <a href="">Tambah</a>
      <h1>Tambah Anggota</h1>
      <form method="POST" action="{{ route('anggota.store') }}">
        @csrf
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
          <div class="text-right">
          <a href="{{ route('anggota.index') }}" class="btn btn-secondary" id="cancel-button">Batal</a>
          <button type="submit" class="btn btn-warning" formaction="{{ route('anggota.index') }}">Simpan</button>
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
