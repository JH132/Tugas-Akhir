<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
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
        <a href="{{ route('buku.index') }}">Buku/</a>
        <a href="">{{ $buku->judul }}</a>
        <h1>Detail Buku</h1>
        <div class="text-right">
            <div class="d-flex justify-content-end">
                <a href="{{ route('buku.edit', $buku->id_buku) }}" class="btn btn-info mr-2">Edit</a>
                <form id="deleteForm" action="{{ route('buku.delete', $buku->id_buku) }}" method="POST">
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
                    <th>ID Buku</th>
                    <td>{{ $buku->id_buku }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Pengarang</th>
                    <td>{{ $buku->pengarang }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $buku->kategori }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $buku->deskripsi }}</td>
                </tr>
                <tr>
                    <th>Jumlah Salinan</th>
                    <td>{{ $buku->jumlah_salinan }}</td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>
            </tbody>
        </table>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
        <script>
            // Fungsi untuk menampilkan pop-up konfirmasi menggunakan SweetAlert
            function confirmDelete() {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data buku?',
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