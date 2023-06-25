@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="img/logo.png" alt="Logo" class="img-fluid" style="width: 300px; height: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto">
                <div class="card">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deskripsi Rentbook</h4>
                        <p class="card-text">
                            Selamat datang di halaman admin sistem peminjaman buku. Di sini, Anda dapat mengelola dan memantau aktivitas peminjaman buku dari pengguna.
                        </p>
                        <p class="card-text">
                            Fitur utama yang tersedia di halaman admin:
                        </p>
                        <ol class="card-text">
                            <li>
                                Manajemen Buku:
                                <ul>
                                    <li>Tambahkan buku baru ke dalam sistem.</li>
                                    <li>Perbarui informasi buku seperti judul, penulis, dan kategori.</li>
                                    <li>Hapus buku yang tidak lagi tersedia atau tidak relevan.</li>
                                </ul>
                            </li>
                            <li>
                                Peminjaman Buku:
                                <ul>
                                    <li>Lihat daftar peminjaman buku saat ini.</li>
                                    <li>Menghapus daftar peminjaman</li>
                                    <li>Memasukkan data peminjaman</li>
                                    <li>Mengubah status peminjaman</li>
                                </ul>
                            </li>
                            <li>
                                Pengguna:
                                <ul>
                                    <li>Lihat daftar pengguna yang terdaftar dalam sistem.</li>
                                    <li>Perbarui informasi pengguna seperti nama, alamat, dan kontak.</li>
                                    <li>Suspend atau hapus pengguna yang melanggar kebijakan atau tidak aktif.</li>
                                </ul>
                            </li>
                        </ol>
                        <p class="card-text">
                            Halaman admin ini dirancang untuk memberikan kontrol penuh atas sistem peminjaman buku. Pastikan untuk menggunakan fitur-fitur yang tersedia dengan bijak untuk menjaga integritas dan efisiensi operasional sistem.
                        </p>
                        <p class="card-text">
                            Jika Anda memiliki pertanyaan atau mengalami kesulitan, jangan ragu untuk menghubungi tim teknis kami. Selamat bekerja dan semoga sukses dalam mengelola sistem peminjaman buku ini!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
