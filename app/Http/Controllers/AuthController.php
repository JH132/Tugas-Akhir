<?php
  
namespace App\Http\Controllers;
  
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth/login');
    }
  
    // public function registerSave(Request $request)
    // {
    //     Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed'
    //     ])->validate();
  
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
  
    //     return redirect()->route('login');
    // }
  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $user = Auth::user();
        $status = $user->status;
        
        if ($status === 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home');
        }
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/login');
    }
 
    public function profile()
    {
        return view('profile');
    }

    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ], [
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.'
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
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 0 // Status default untuk akun baru
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
    return view('auth.biodata', [
        'email' => $request->session()->get('email')
    ]);
}
}