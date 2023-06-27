<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Anggota;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());
        $anggota = Anggota::where('id_users', $user->id)->first();
        return view('home.profile', compact('anggota','user'));
    }

    public function update(Request $request)
    {
        // $attributes = $request->validate([
        //     'nama' => ['max:255'],
        //     'alamat' => ['max:100'],
        //     'nomor_telepon' => ['max:100']
        // ]);
    
        $user = User::find(Auth::id());
        $anggota = Anggota::where('id_users', $user->id)->first();    
        $anggota->update([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'nomor_telepon' => $request->get('nomor_telepon')
        ]);
    
        return back()->with('success', 'Profile successfully updated');
    }
    
}