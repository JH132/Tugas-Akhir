<!DOCTYPE html>
<html>
  <head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      body {
        margin: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <a href="{{ route('dashboard') }}">Dashboard/</a>
      <a href="{{ route('buku.index') }}">Buku/</a>
      <a href="{{ route('buku.detail', ['id_buku' => $buku->id_buku]) }}">{{ $buku->judul }}/</a>
      <a href="">Edit</a>
      <h1>Edit Buku</h1>
      <br/>
      <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="judul">Judul:</label>
          <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
        </div>
        <div class="form-group">
          <label for="pengarang">Pengarang:</label>
          <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}" required>
        </div>
        <div class="form-group">
          <label for="penerbit">Penerbit:</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}" required>
        </div>
        <div class="form-group">
          <label for="tahun_terbit">Tahun Terbit:</label>
          <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori:</label>
          <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $buku->kategori }}" required>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi:</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $buku->deskripsi }}</textarea>
        </div>
        <div class="form-group">
          <label for="jumlah_salinan">Jumlah Salinan:</label>
          <input type="text" class="form-control" id="jumlah_salinan" name="jumlah_salinan" value="{{ $buku->jumlah_salinan }}" required>
        </div>
        <div class="form-group">
          <label for="isbn">ISBN:</label>
          <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $buku->isbn }}" required>
        </div>
        <div class="text-right">
          <a href="{{ route('buku.detail', ['id_buku' => $buku->id_buku]) }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <script>
          document.querySelector('.btn-secondary').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form submission

            Swal.fire({
              title: 'Konfirmasi',
              text: 'Apakah Anda yakin batal mengubah buku?',
              showCancelButton: true,
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak',
              icon: 'warning'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "{{ route('buku.detail', ['id_buku' => $buku->id_buku]) }}";
              }
            });
          });
        </script>
      </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>