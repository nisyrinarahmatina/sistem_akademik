<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
    
        // Attempt login using default guard
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // now it will return the logged-in user
    
            if ($user->role == 'Guru') {
                return redirect('/dashboardguru');
            } elseif ($user->role == 'Murid') {
                return redirect('/dashboardmurid');
            } elseif ($user->role == 'Admin') {
                return redirect('/dashboardadmin');
            }
            return redirect('/login')->with('error', 'Role tidak dikenali.');
        }
    
        return redirect('/login')->with('error', 'Login gagal! Username atau password salah.');
    }    
} 
