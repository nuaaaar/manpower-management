<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login.index');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user == null)
        {
            return redirect()->back()->with('ERR', 'Email tidak terdaftar');
        }

        if ($user->status == 'non-aktif')
        {
            return redirect()->back()->with('ERR', 'Akun Anda di non-aktifkan, silahkan hubungi admin untuk mengaktifkan kembali akun Anda');
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('ERR', 'Password salah');
        }

        return redirect()->route('dashboard.index')->with('OK', 'Berhasil masuk ke dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('OK', 'Berhasil keluar dari dashboard');
    }
}
