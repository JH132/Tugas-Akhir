<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $peminjamans = Peminjaman::all();
    return view('peminjaman.index', compact('peminjamans', 'search'));
}


    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjaman.create', compact('anggotas', 'bukus'));
    }

    public function detail($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $anggota = Anggota::findOrFail($peminjaman->id_anggota);
    $buku = Buku::findOrFail($peminjaman->id_buku);
    return view('peminjaman.detail', compact('peminjaman', 'anggota', 'buku'));
}

public function delete($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus');
    }

public function store(Request $request)
{
    $this->validate($request, [
        'id_anggota' => 'required',
        'id_buku' => 'required',
        'tanggal_peminjaman' => 'required',
        'tanggal_pengembalian' => 'required',
    ]);

    Peminjaman::create($request->all());

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil disimpan.');
}

public function updateStatus(Request $request)
    {
        $peminjaman = Peminjaman::findOrFail($request->id);
        $peminjaman->update(['status' => $request->status]);

        return response()->json(['message' => 'Status updated successfully.']);
    }

    public function edit($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'anggotas', 'bukus'));
    }

    public function update(Request $request, $id_peminjaman)
{
    $peminjaman = Peminjaman::findOrFail($id_peminjaman);
    
    // Lakukan validasi data yang dikirimkan melalui $request jika diperlukan

    // Update data buku
    $peminjaman->id_anggota = $request->input('id_anggota');
    $peminjaman->id_buku = $request->input('id_buku');
    $peminjaman->tanggal_peminjaman = $request->input('tanggal_peminjaman');
    $peminjaman->tanggal_pengembalian = $request->input('tanggal_pengembalian');
    $peminjaman->status = $request->input('status');

    // Update atribut lainnya

    // Simpan perubahan
    $peminjaman->save();

    return redirect()->route('peminjaman.detail', ['id_peminjaman' => $peminjaman->id_peminjaman])->with('success', 'Data peminjaman berhasil diperbarui');
}
}
