<!DOCTYPE html>
<html>
<head>
    <title>Detail Peminjaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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

        /* Custom button style */
        .btn-orange {
            color: #fff;
            background-color: orange;
            border-color: orange;
            width: 70px;
        }

        .btn-orange:hover,
        .btn-orange:focus {
            color: #fff;
            background-color: darkorange;
            border-color: darkorange;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
          <a href="{{ route('dashboard') }}">Dashboard/</a>
          <a href="{{ route('anggota.index') }}">Anggota/</a>
          <a href="{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}">{{ $anggota->nama }}/</a>
          <a href="">Edit</a>
      </div>
      <h1>Edit Anggota</h1>
      <br/>
      <form method="POST" action="{{ route('anggota.update', $anggota->id_anggota) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $anggota->email }}" required>
        </div>
        <div class="form-group">
          <label for="nomor_telepon">Nomor Telepon</label>
          <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $anggota->nomor_telepon }}" required>
        </div>
        <div class="form-group">
          <label for="tanggal_bergabung">Tanggal Bergabung</label>
          <input type="text" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ $anggota->tanggal_bergabung }}" required>
        </div>
        <div class="text-right">
          <a href="{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <script>
          document.querySelector('.btn-secondary').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form submission

            Swal.fire({
              title: 'Konfirmasi',
              text: 'Apakah Anda yakin batal mengubah data anggota?',
              showCancelButton: true,
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak',
              icon: 'warning'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}";
              }
            });
          });
        </script>
      </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>