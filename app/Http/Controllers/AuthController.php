<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // method for viewing login page
    public function viewLogin()
    {
        return view('auth/login');
    }
    public function logicSkillTest()
    {
        return view('auth/blank');
    }

    // method for viewing register form
    public function viewRegister(Request $request)
    {
        $request = $request->type;
        return view('auth/register', ['type' => $request]);
    }

    // Method for validating and insert Password
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "no_telp" => "required",
            "email" => "required|unique:users|email",
            "password" => "required|min:8",
            "confirm-password" => "required|same:password",
        ]);

        $input = $request->all();


        if ($input['type'] == 'customer') {
            $roles = '3';
        } elseif ($input['type'] == 'tenant') {
            $roles = '2';
        } else {
            abort(404);
        }


        try {
            $data = [
                "name" => $input['name'],
                "roles_id" => $roles,
                "email" => $input['email'],
                "no_telp" => $input['no_telp'],
                "password" => Hash::make($input['password']),
            ];

            // Create user from data
            User::create($data);
        } catch (Exception $e) {
            // dd($e);
            abort(404);
        }

        return redirect(route('view-login'))->with('success', 'Registrasi Berhasil');
    }

    // Authenticate validation
    public function authenticate(Request $request)
    {
        // Validasi email dan password yang dikirimkan oleh form login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba untuk melakukan otentikasi dengan email dan password
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Intended digunakan untuk melewati Middleware dan mengarahkan ke halaman yang dimaksud
            return redirect()->intended(route('view-dashboard'));
        } else {
            // Jika otentikasi gagal, kirim pesan error
            return back()->with('error', 'Email atau Kata Sandi salah!');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        if (auth()) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            // Redirect ke halaman login dengan pesan logout sukses
            return redirect(route('view-login'))->with('logout-success', 'Berhasil keluar!');
        } else {
            // Jika tidak ada pengguna yang terautentikasi, redirect ke halaman login
            abort(404);
        }
    }
}
