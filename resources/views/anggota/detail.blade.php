<!DOCTYPE html>
<html>
<head>
    <title>Detail Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            margin: 20px
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}">Dashboard/</a>
        <a href="{{ route('anggota.index') }}">Anggota/</a>
        <a href="">{{ $anggota->nama }}</a>
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