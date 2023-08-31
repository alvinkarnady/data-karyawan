<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([

            // email yang ketat
            // 'email' => 'required|email:dns',
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $email = $credentials['email'];
        $password = $credentials['password'];


        if (Auth::attempt(['email_users' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            // Menyimpan URL sebelumnya ke dalam session
            $previousUrl = $request->session()->get('previousUrl');
            if ($previousUrl) {
                $request->session()->forget('previousUrl');
                return redirect()->to($previousUrl);
            }

            return redirect()->intended('/dashboard');
        }


        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
