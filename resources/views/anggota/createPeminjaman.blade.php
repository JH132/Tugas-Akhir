<!DOCTYPE html>
<html>
  <head>
    <title>Request Peminjaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
      body {
        margin: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <a href="{{ route('dashboard') }}">Dashboard/</a>
      <a href="{{ route('peminjaman.index') }}">Peminjaman/</a>
      <a href="">Tambah</a>
      <h1>Request Peminjaman</h1>
      <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <div class="form-group">
          <label for="id_buku">ID Buku:</label>
          <select class="form-control select2" id="id_buku" name="id_buku" required>
            <option value="" selected disabled>Masukkan ID</option>
            @foreach($bukus as $buku)
              <option value="{{ $buku->id_buku }}">{{ $buku->id_buku }} - {{ $buku->judul }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
          <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
        </div>
        <div class="form-group">
          <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
          <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
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

      // Mendapatkan elemen input tanggal peminjaman dan tanggal pengembalian
      var tanggalPeminjaman = document.getElementById('tanggal_peminjaman');
      var tanggalPengembalian = document.getElementById('tanggal_pengembalian');

      // Menambahkan event listener ketika tanggal peminjaman berubah
      tanggalPeminjaman.addEventListener('change', function() {
        // Menghitung tanggal maksimal pengembalian (7 hari setelah tanggal peminjaman)
        var tanggalMaksimal = new Date(tanggalPeminjaman.value);
        tanggalMaksimal.setDate(tanggalMaksimal.getDate() + 7);

        // Mengatur tanggal pengembalian minimum dan maksimum
        tanggalPengembalian.min = tanggalPeminjaman.value;
        tanggalPengembalian.max = tanggalMaksimal.toISOString().split('T')[0];
      });
    </script>
  </body>
</html>