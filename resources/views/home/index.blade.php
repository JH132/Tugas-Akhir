@extends('layouts.app', ['class' => 'g-sidenav2-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav2', ['title' => 'Home'])
    @include('layouts.navbars.auth.sidenav2', ['title' => 'Home'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="mb-0">Daftar Buku</h1>
                        </div>

                    <br>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Jumlah Buku</th>
                                        <!-- <th class="text-center">Aksi</th> -->
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
        @include('layouts.footers.auth.footer')
    </div>
    <script>
        $(document).ready(function()

 {
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