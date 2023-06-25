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
            <a href="{{ route('buku.index') }}">Buku</a> /
            <a href="#">Tambah</a>
        </div>
        <h1>Tambah Buku</h1>
        <div class="form-container">
            <form method="POST" action="{{ route('buku.store') }}">
                @csrf
                <div class="form-group">
                    <label for="id_buku">ID Buku:</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" required>
                </div>
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang:</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit:</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit:</label>
                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="jumlah_salinan">Jumlah Salinan:</label>
                    <input type="text" class="form-control" id="jumlah_salinan" name="jumlah_salinan" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="button-container">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary" id="cancel-button">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
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
                    window.location.href = "{{ route('buku.index') }}";
                }
            });
        });
    </script>
</body>
</html>
