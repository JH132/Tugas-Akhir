<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BiodataController extends Controller
{
    public function index()
    {
        return view('auth/biodata');
    }
    /**
     * Menyimpan data biodata ke tabel users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form biodata
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tanggal_bergabung' => 'required|date',
        ]);

        // Buat record baru dalam tabel users
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt('password'); // Ganti dengan password yang sesuai
        $user->address = $validatedData['alamat'];
        $user->phone = $validatedData['no_telepon'];
        $user->join_date = $validatedData['tanggal_bergabung'];
        $user->save();

        return redirect()->route('login');
    }
}
