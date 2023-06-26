<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $anggotas = Anggota::query();
    
        $search = $request->input('search');
        if ($search) {
            $anggotas->where(function ($query) use ($search) {
                $query->where('id_anggota', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('nomor_telepon', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
    $anggotas = $anggotas->get();
    return view('anggota.index', compact('anggotas'));
    
    }
    public function lihatPinjam(Request $request)
    {
        $userId = Auth::id();

        // Mengambil data peminjaman yang berkaitan dengan anggota yang sedang login
        $peminjamans = Peminjaman::whereHas('anggota', function ($query) use ($userId) {
            $query->where('id_users', $userId);
        })->get();

        // $anggotas = Anggota::all();
        $search = $request->input('search');
        if ($search) {
            $peminjamans->whereHas('buku', function ($query) use ($search) {
                $query->where('judul', 'LIKE', '%' . $search . '%');
            });
        }
        // $peminjamans = Peminjaman::all();
        return view('anggota.lihatPinjam', compact('peminjamans', 'search'));
    }


    public function detail($id_anggota)
    {
        $anggota = Anggota::where('id_anggota', $id_anggota)->first();

        if (!$anggota) {
            abort(404); // Tampilkan halaman 404 jika anggota tidak ditemukan
        }

        return view('anggota.detail', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }
    public function createPeminjaman()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('anggota.createPeminjaman', compact('anggotas', 'bukus'));
    }
    public function storePeminjaman(Request $request)
{
    $this->validate($request, [
        'id_buku' => 'required',
        'tanggal_peminjaman' => 'required',
        'tanggal_pengembalian' => 'required',
    ]);
    $user = User::find(Auth::id());
    $anggota = Anggota::where('id_users', $user->id)->first();
    $id_anggota = $anggota->id_anggota;

    $status = 'Diproses';

    // Buat instansi Peminjaman
    $peminjaman = new Peminjaman;
    $peminjaman->id_anggota = $id_anggota;
    $peminjaman->id_buku = $request->id_buku;
    $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
    $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
    $peminjaman->status = $status;
    $peminjaman->save();

    return redirect()->route('anggota.lihatPinjam')->with('success', 'Request peminjaman berhasil disimpan.');
}


    public function store(Request $request)
{
    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'nomor_telepon' => 'required',
        'tanggal_bergabung' => 'required',
    ]);

    $anggota = new Anggota();
    $anggota->nama = $request->input('nama');
    $anggota->alamat = $request->input('alamat');
    $anggota->email = $request->input('email');
    $anggota->nomor_telepon = $request->input('nomor_telepon');
    $anggota->tanggal_bergabung = $request->input('tanggal_bergabung');
    $anggota->save();

    return redirect()->route('anggota.index')->with('success', 'Anggota berhasil disimpan.');
}
public function store2(Request $request)
{
    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'email' => 'required|email',
        'nomor_telepon' => 'required',
    ]);

    // Cari pengguna berdasarkan alamat email
    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        // Jika pengguna tidak ditemukan, kembalikan respon dengan pesan error
        return redirect()->route('register')->with('error', 'Email tidak ditemukan.');
    }

    // Buat objek Anggota dan atur nilainya
    $anggota = new Anggota();
    $anggota->nama = $request->input('nama');
    $anggota->alamat = $request->input('alamat');
    $anggota->email = $request->input('email');
    $anggota->nomor_telepon = $request->input('nomor_telepon');
    $anggota->tanggal_bergabung = now();
    $anggota->id_users = $user->id; // Set nilai id_users dengan id pengguna

    // Simpan objek Anggota
    $anggota->save();

    return redirect()->route('login')->with('success', 'Anggota berhasil melakukan registrasi.');
}

    public function destroy($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);

        // Hapus semua data peminjaman terkait dengan anggota
        Peminjaman::where('id_anggota', $id_anggota)->delete();

        // Hapus data anggota
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }



    public function edit($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);

        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id_anggota)
{
    $anggota = Anggota::findOrFail($id_anggota);
    
    // Lakukan validasi data yang dikirimkan melalui $request jika diperlukan

    // Update data anggota
    $anggota->nama = $request->input('nama');
    $anggota->alamat = $request->input('alamat');
    $anggota->nomor_telepon = $request->input('nomor_telepon');
    $anggota->tanggal_bergabung = $request->input('tanggal_bergabung');

    // Periksa apakah input 'email' tidak kosong sebelum menyimpan
    $email = $request->input('email');
    if (!empty($email)) {
        $anggota->email = $email;
    }

    // Update atribut lainnya

    // Simpan perubahan
    $anggota->save();

    return redirect()->route('anggota.detail', ['id_anggota' => $anggota->id_anggota])->with('success', 'Data anggota berhasil diperbarui');
}

}
