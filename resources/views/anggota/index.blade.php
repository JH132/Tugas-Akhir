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
                    </div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari anggota...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="searchButton" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
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
                                <tr>
                                    <td class="text-center">{{ $anggota->id_anggota }}</td>
                                    <td class="text-center">{{ $anggota->nama }}</td>
                                    <td class="text-center">{{ $anggota->nomor_telepon }}</td>
                                    <td class="text-center">{{ $anggota->email }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('anggota.detail', ['id_anggota' => $anggota->id_anggota]) }}" class="btn btn-info">Detail</a>
                                        </div>
                                    </td>
                                </tr>
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
        $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var input, filter, table, tr, td, i, txtValue;
                input = $('#searchInput').val();
                filter = input.toLowerCase();
                table = $("table");
                tr = table.find('tbody tr'); // Ubah hanya mencari tr di dalam tbody
                tr.each(function() {
                    var match = false;
                    $(this).find('td').each(function() {
                        td = $(this);
                        if (td) {
                            txtValue = td.text().toLowerCase();
                            if (txtValue.indexOf(filter) > -1) {
                                match = true;
                                return false; // Berhenti perulangan saat ada kecocokan
                            }
                        }
                    });
                    if (match) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    <style>
    .input-group {
        width: 100%;
    }

    .form-control {
        width: 100%;
    }

    .input-group-append {
        display: flex;
        padding-left: 8px; /* Menambahkan space kosong menggunakan padding kiri */
    }

    .input-group-append .btn {
        margin-left: -1px;
    }
    </style>
@endsection
