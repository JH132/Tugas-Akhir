@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Anggota'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="mb-0">Tabel Anggota</h1>
                            <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
                        </div>
                        <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Anggota...">
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Nomor Telepon</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $anggota)
                                    @if (strpos(strtolower($anggota->id_anggota), strtolower(request()->input('search'))) !== false
                                        || strpos(strtolower($anggota->nama), strtolower(request()->input('search'))) !== false
                                        || strpos(strtolower($anggota->nomor_telepon), strtolower(request()->input('search'))) !== false
                                        || strpos(strtolower($anggota->email), strtolower(request()->input('search'))) !== false)
                                        <tr>
                                            <td class="text-center">{{ $anggota->id_anggota }}</td>
                                            <td class="text-center">{{ $anggota->nama }}</td>
                                            <td class="text-center">{{ $anggota->nomor_telepon }}</td>
                                            <td class="text-center">{{ $anggota->email }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}" class="btn btn-warning text-white">Detail</a>
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
    <!-- <style>
    .input-group {
        width: 100%;
    }

    .form-control {
        width: 100%;
    }

    .input-group-append {
        display: flex;
        padding-left: 8px; 
    }

    .input-group-append .btn {
        margin-left: -1px;
    }
    </style> -->
@endsection 