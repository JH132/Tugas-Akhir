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
        <a href="{{ route('home.index') }}">Home/</a>
        <a href="">{{ $buku->judul }}</a>
        <h1>Detail Buku</h1>
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
                    <th>Jumlah Tersedia</th>
                    <td>{{ $buku->jumlah_tersedia }}</td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>