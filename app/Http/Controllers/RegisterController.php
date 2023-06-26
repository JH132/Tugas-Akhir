<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Anggota;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Email sudah terdaftar di tabel Users
            return redirect()->back()->withErrors(['email' => 'Anda sudah terdaftar']);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => 0 // Status default untuk akun baru
            ]);

            $existingAnggota = Anggota::where('email', $request->email)->first();

            if ($existingAnggota) {
                // Email sudah terdaftar di tabel Anggota
                $existingAnggota->id_users = $user->id;
                $existingAnggota->save();
            } else {
                // Email tidak terdaftar di tabel Anggota
                $request->session()->flash('name', $request->name);
                $request->session()->flash('email', $request->email);
                return redirect()->route('register.anggota');
            }
        }

        return redirect()->route('login');
    }

    public function registerAnggota(Request $request)
{
    return view('pengguna.create', [
        'name' => $request->session()->get('name'),
        'email' => $request->session()->get('email')
    ]);
}
}
