<!DOCTYPE html>
<html>
<head>
    <title>Detail Peminjaman</title>
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
        <a href="{{ route('dashboard') }}">Dashboard/</a>
        <a href="{{ route('peminjaman.index') }}">Peminjaman/</a>
        <a href="">{{ $peminjaman->id_peminjaman }}</a>
        <h1>Detail Peminjaman</h1>
        <div class="text-right">
            <div class="d-flex justify-content-end">
                <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}" class="btn btn-info mr-2">Edit</a>
                <form id="deleteForm" action="{{ route('peminjaman.delete', $peminjaman->id_peminjaman) }}" method="POST">
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
                    <th>ID Peminjaman</th>
                    <td>{{ $peminjaman->id_peminjaman }}</td>
                </tr>
                <tr>
                    <th>ID Anggota</th>
                    <td>{{ $peminjaman->id_anggota }}</td>
                </tr>
                <tr>
                    <th>Nama Anggota</th>
                    <td>{{ $anggota->nama }}</td>
                </tr>
                <tr>
                    <th>ID Buku</th>
                    <td>{{ $peminjaman->id_buku }}</td>
                </tr>
                <tr>
                    <th>Judul Buku</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $peminjaman->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Tambahkan SweetAlert CSS dan JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>

<!-- Tambahkan kode JavaScript berikut -->
<script>
    // Fungsi untuk menampilkan pop-up konfirmasi menggunakan SweetAlert
    function confirmDelete() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus data peminjaman?',
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

</body>
</html>