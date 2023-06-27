@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Peminjaman'])

    <style>
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            margin-right: 10px;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="mb-0">Tabel Peminjaman</h1>
                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
                        </div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <form action="{{ route('peminjaman.index') }}" method="GET" class="search-form">
                                <div class="col-md-6 search-input">
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{ request()->input('search') }}" id="searchInput" class="form-control" placeholder="Cari peminjaman...">
                                        <input type="hidden" name="filter" value="{{ request()->input('filter') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="searchButton" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Judul Buku</th>
                                    <th class="text-center">Nama Anggota</th>
                                    <th class="text-center">Tanggal Pengembalian</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($peminjamans as $peminjaman)
                                        @php
                                            $search = strtolower(request()->input('search')); // Mengubah pencarian menjadi lowercase
                                        @endphp
                                        @if (preg_match("/$search/i", $peminjaman->id_peminjaman) || 
                                            preg_match("/$search/i", $peminjaman->buku->judul) || 
                                            preg_match("/$search/i", $peminjaman->anggota->nama) || 
                                            preg_match("/$search/i", $peminjaman->tanggal_pengembalian) || 
                                            preg_match("/$search/i", $peminjaman->status))
                                            <tr>
                                                <td class="text-center">{{ $peminjaman->id_peminjaman }}</td>
                                                <td class="text-center">{{ $peminjaman->buku->judul }}</td>
                                                <td class="text-center">{{ $peminjaman->anggota->nama }}</td>
                                                <td class="text-center">{{ $peminjaman->tanggal_pengembalian }}</td>
                                                <td class="text-center">
                                                    <select class="form-control status-select" data-id="{{ $peminjaman->id_peminjaman }}">
                                                        <option value="Dipinjam" {{ $peminjaman->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                                        <option value="Tepat Waktu" {{ $peminjaman->status == 'Tepat Waktu' ? 'selected' : '' }}>Tepat Waktu</option>
                                                        <option value="Terlambat" {{ $peminjaman->status == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('peminjaman.detail', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}" class="btn btn-warning">Detail</a>
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
        $(document).ready(function() {
            // Menggunakan event change untuk memperbarui status saat dipilih
            $('.status-select').change(function() {
                var id = $(this).data('id');
                var status = $(this).val();
                $.ajax({
                    url: '/peminjaman/update-status',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var input, filter, table, tr, td, i, txtValue;
                input = $(this).val();
                filter = input.toLowerCase();
                table = $("table");
                tr = table.find('tbody tr'); // Ubah hanya mencari tr di dalam tbody
                tr.each(function() {
                    var match = false;
                    $(this)
                        .find('td')
                        .each(function() {
                            td = $(this);
                            if (td) {
                                txtValue = td
                                    .text()
                                    .toLowerCase();
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
@endsection 