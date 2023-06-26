<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $bukus = Buku::query();
    
        $search = $request->input('search');
        if ($search) {
            $bukus->where(function ($query) use ($search) {
                $query->where('id_buku', 'like', '%' . $search . '%')
                    ->orWhere('judul', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%');
            });
        }
    
        $bukus = $bukus->get();
    
        return view('buku.index', compact('bukus'));
    }
    

public function detail($id_buku)
{
    $buku = Buku::where('id_buku', $id_buku)->first();

    if (!$buku) {
        abort(404); // Tampilkan halaman 404 jika buku tidak ditemukan
    }

    return view('buku.detail', compact('buku'));
}
  public function create()
{
    return view('Buku.create');
}
public function store(Request $request)
{
    $this->validate($request, [
        'id_buku' => 'required',
        'judul' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'required',
        'jumlah_salinan' => 'required',
        'isbn' => 'required',
    ]);

    Buku::create($request->all());

}

    public function destroy($id_buku)
    {
        $buku = Buku::findOrFail($id_buku);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }

    public function edit($id_buku)
{
    $buku = Buku::findOrFail($id_buku);

    return view('buku.edit', compact('buku'));
}

public function update(Request $request, $id_buku)
{
    $buku = Buku::findOrFail($id_buku);
    
    // Lakukan validasi data yang dikirimkan melalui $request jika diperlukan

    // Update data buku
    $buku->judul = $request->input('judul');
    $buku->pengarang = $request->input('pengarang');
    $buku->penerbit = $request->input('penerbit');
    $buku->tahun_terbit = $request->input('tahun_terbit');
    $buku->kategori = $request->input('kategori');
    $buku->deskripsi = $request->input('deskripsi');
    $buku->jumlah_salinan = $request->input('jumlah_salinan');
    $buku->isbn = $request->input('isbn');
    // Update atribut lainnya

    // Simpan perubahan
    $buku->save();

    return redirect()->route('buku.detail', ['id_buku' => $buku->id_buku])->with('success', 'Data buku berhasil diperbarui');
}

}