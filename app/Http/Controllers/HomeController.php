<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{

public function index(Request $request)
{
    $search = $request->input('search');

    $bukus = Buku::query();

    if ($search) {
        $bukus->where(function ($query) use ($search) {
            $query->where('id_buku', 'like', "%$search%")
                ->orWhere('judul', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        });
    }

    $bukus = $bukus->get();

    $bukus->each(function ($buku) {
        $buku->jumlah_tersedia = $buku->jumlah_salinan - $buku->peminjaman()->where('status', 'dipinjam')->count();
    });

    return view('home.index', compact('bukus'));
}


    public function detail($id_buku)
{
    $buku = Buku::where('id_buku', $id_buku)->first();

    if (!$buku) {
        abort(404); // Tampilkan halaman 404 jika buku tidak ditemukan
    } else{

        $buku->jumlah_tersedia = $buku->jumlah_salinan - $buku->peminjaman()->where('status', 'dipinjam')->count();
    }
    

    return view('home.detail', compact('buku'));
}
}