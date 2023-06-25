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
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');

        $anggota = Anggota::where('nama', $name)->orWhere('email', $email)->first();

        if ($anggota) {
            return redirect()->route('login')->with('status', 'User already registered. Please login.');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('biodata');
    }
}
