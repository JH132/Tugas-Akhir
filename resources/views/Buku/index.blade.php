@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="mb-0">Tabel Buku</h1>
                            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
                        </div>
                        <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari buku...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="searchButton" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Jumlah Buku</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukus as $buku)
                                    @if (strpos(strtolower($buku->id_buku), strtolower(request()->input('search'))) !== false
                                        || strpos(strtolower($buku->judul), strtolower(request()->input('search'))) !== false
                                        || strpos(strtolower($buku->kategori), strtolower(request()->input('search'))) !== false)
                                        <tr>
                                            <td class="text-center">{{ $buku->id_buku }}</td>
                                            <td class="text-center">{{ $buku->judul }}</td>
                                            <td class="text-center">{{ $buku->kategori }}</td>
                                            <td class="text-center">{{ $buku->jumlah_salinan }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('buku.detail', ['id_buku' => $buku->id_buku]) }}" class="btn btn-warning text-white">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var searchButton = document.getElementById('searchButton');
            var table = document.querySelector('table');
            var rows = table.querySelectorAll('tbody tr');

            searchButton.addEventListener('click', function() {
                filterTable();
            });

            searchInput.addEventListener('keypress', function(e) {
                if (e.which === 13) {
                    filterTable();
                    return false;
                }
            });

            function filterTable() {
                var filter = searchInput.value.toLowerCase();
                rows.forEach(function(row) {
                    var cells = row.getElementsByTagName('td');
                    var match = false;
                    Array.from(cells).forEach(function(cell) {
                        var text = cell.textContent.toLowerCase();
                        if (text.indexOf(filter) > -1) {
                            match = true;
                        }
                    });
                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection