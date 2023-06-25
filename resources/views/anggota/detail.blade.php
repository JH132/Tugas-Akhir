@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Anggota'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-4">
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
                            </div>
                            <div class="table-responsive">
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
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
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
@endsection