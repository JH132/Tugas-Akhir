<!DOCTYPE html>
<html>
<head>
    <title>Detail Anggota</title>
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
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('anggota.index') }}">Anggota</a> /
            <a href="">{{ $anggota->nama }}</a>
        </div>
        <h1>Detail Anggota</h1>
        <div class="text-right">
            <div class="d-flex justify-content-end">
                <a href="{{ route('anggota.edit', $anggota->id_anggota) }}" class="btn btn-info mr-2">Edit</a>
                <form  id="deleteForm" action="{{ route('anggota.delete', $anggota->id_anggota) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
            </form>
            </div>
        </div>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID Anggota</th>
                    <td>{{ $anggota->id_anggota }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $anggota->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $anggota->email }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $anggota->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th>Tanggal Bergabung</th>
                    <td>{{ $anggota->tanggal_bergabung }}</td>
                </tr>
            </tbody>
        </table>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
        <script>
            document.getElementById('confirmDelete').addEventListener('click', function() {
                var confirmDelete = confirm('Apakah Anda yakin ingin menghapus anggota?');
                if (confirmDelete) {
                    document.getElementById('deleteForm').submit();
                }
            });
        </script>
        <script>
            // Fungsi untuk menampilkan pop-up konfirmasi menggunakan SweetAlert
            function confirmDelete() {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data anggota?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("deleteForm").submit();
                    }
                });
            }
        </script>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


