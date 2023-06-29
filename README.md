<p align="center"><a href="#" target="_blank"><img src="https://github.com/fathiamaliah/pemweb/blob/cd05ae3ca746bf99a9b4c3612b871672f3866adb/4.png" width="400" alt="Laravel Logo"></a></p>

# RentBook

RentBook adalah sebuah website yang memungkinkan anggota untuk mencari, melihat ketersediaan buku yang tersedia untuk dipinjam, dan meminjam buku-buku yang tersedia. Untuk admin, yang tersedia adalah laman dashboard,  buku, anggota, dan peminjaman dan untuk anggota tersedia laman home, peminjaman untuk anggota, dan profil. Selain itu,  admin di sini memiliki akses tambahan untuk melihat, mengedit, dan menambah  seluruh data pada website, sedangkan anggota hanya dapat melihat dan mencari data serta hanya bisa melakukan create pada laman peminjaman untuk anggota.

## Fitur Utama

1. Login dan Register
   - Anggota terlebih dahulu harus login untuk mengakses laman-laman yang ada untuk angggota. Apabila tidak memiliki akun, anggota harus melakukan resgister.
   - Admin dapat memasukkan akun beserta kredensialnya agar dapat divalidasi keautentikasiannya.
     
2. Filter Search
   - Anggota dapat menggunakan fitur filter search untuk mencari buku berdasarkan id, judul, kategori, dan jumlah buku.
   - Anggota dapat menggunakan fitur filter search untuk mencari peminjaman yang telah dibuat berdasarkan judul buku, tanggal peminjaman, tanggal pengembalian, dan status.
   - Hasil pencarian akan menampilkan daftar buku dan peminjaman yang sesuai dengan kriteria yang dimasukkan.
   - Admin juga dapat melakukan search pada laman buku, anggota, dan peminjaman.

3. Pembatasan Akses Anggota
   - Anggota hanya dapat melihat data buku dan menggunakan fitur filter search.
   - Anggota tidak dapat mengedit atau menambahkan data buku dan anggota karena tidak memiliki akses.
   - Anggota hanya bisa menambahkan data peminjaman dengan menambahkan data peminjaman yang bisa diakses oleh anggota.

4. Manajemen Admin
   - Admin memiliki akses tambahan untuk melihat, mengedit, dan menambah data pada website.
   - Admin dapat melakukan CRUD (Create, Read, Update, Delete) terhadap entitas Anggota, Buku, dan Peminjaman.

5. Entitas Website

   - Anggota: Menyimpan informasi tentang Anggota, seperti id, nama, alamat, email, nomor telepon, dan tanggal bergabung.
   - Buku: Menyimpan informasi tentang buku, seperti id, judul, pengarang/penulis, penerbit, tahun terbit, kategori, deskripsi, jumlah salinan/jumlah buku  dan isbn.
   - Peminjaman: Menyimpan informasi tentang peminjaman buku, termasuk id peminjaman, id anggota,  nama anggota, id buku, judul buku, tanggal peminjaman, tanggal          pengembalian, dan status.

6. CRUD Operations

   - Anggota:
     - Create: Admin dapat menambahkan anggota baru ke dalam sistem.
     - Read: Admin dapat melihat daftar anggota yang terdaftar.
     - Update: Admin dapat mengubah informasi anggota.
     - Delete: Admin dapat menghapus anggota dari sistem.

   - Buku:
     - Create: Admin dapat menambahkan buku baru ke dalam sistem.
     - Read: anggota dan admin dapat melihat daftar buku yang tersedia.
     - Update: Admin dapat mengubah informasi buku.
     - Delete: Admin dapat menghapus buku dari sistem.

   - Peminjaman:
     - Create: Admin dapat membuat entri peminjaman baru untuk anggota yang meminjam buku.
     - Read: Pengguna dan admin dapat melihat daftar peminjaman yang terjadi.
     - Update: Admin dapat mengubah status peminjaman.
     - Delete: Admin dapat menghapus entri peminjaman.
       
7. Beberapa Tampilan Website

     - Tampilan Laman Login:
       ![Login Page](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/login%20page.jpeg)
       
     - Tampilan Laman Dashboard Home Anggota:
       ![Home](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/Tampilan%20Daashboard%20Anggota.jpeg)
       
     - Tampilan Profil Anggota:
       ![Profile](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/Halaman%20Profil%20Anggota.jpeg)
       
     - Halaman Request Peminjaman Anggota:
       ![Request](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/Halaman%20Create%20Peminjaman%20Anggota.jpeg)
       
     - Halaman Lihat Peminjaman Anggota:
       ![LihatPinjam](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/Halaman%20Lihat%20Peminjaman%20Anggota.jpeg)
       
     - Halaman Dashboard Admin
       ![Dashboard](https://github.com/fathiamaliah/pemweb/blob/5d21185e299c089755c0f6dbf7731dd7a399df3e/Halaman%20Dashboard%20Admin.jpeg)

## Teknologi yang Digunakan

RentBook dibangun dengan menggunakan kombinasi berbagai teknologi, termasuk:

- Bahasa pemrograman: PHP
- Framework web: Laravel 
- Database: PHPMyAdmin
- Additioanl: HTML, CSS, JavaScript, Blade

## Kontribusi

Jika Anda ingin berkontribusi pada RentBook, silakan ikuti langkah-langkah berikut:

1. Fork repositori RentBook ke akun GitHub Anda.
2. Clone repositori hasil fork ke komputer lokal Anda.
3. Buat branch baru untuk fitur atau perbaikan tertentu.
4. Lakukan perubahan yang diperlukan.
5. Commit dan push perubahan ke branch di repositori GitHub Anda.
6. Ajukan pull request untuk menggabungkan perubahan ke repositori utama.
Pastikan untuk menjelaskan dengan jelas perubahan yang Anda usulkan dalam pull request!

Terima kasih telah menggunakan RentBook! Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami melalui halaman kontak di website ini.
