<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name_users' => 'required|max:255',
            'username_users' => ['required', 'min:3', 'max:255', 'unique:data_users'],
            'phone_number_users' => 'required|unique:data_users',
            'email_users' => 'required|email:dns|unique:data_users',
            'password_users' => 'required|min:5|max:255'
        ]);


        // Menghapus karakter yang tidak diperlukan dari nomor telepon
        $phoneNumber = str_replace(['+', '-', '(', ')', ' '], '', $validatedData['phone_number_users']);

        // Mengubah angka "0" menjadi "62"
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        // Menambahkan format nomor telepon yang diinginkan
        $formattedPhoneNumber = sprintf(
            '(+%s) %s %s %s',
            substr($phoneNumber, 0, 2),
            substr($phoneNumber, 2, 3),
            substr($phoneNumber, 5, 3),
            substr($phoneNumber, 8)
        );

        $validatedData['phone_number_users'] = $formattedPhoneNumber;

        // $validatedData['password'] = bcrypt($vaidatedData['password']);
        $validatedData['password_users'] = Hash::make($validatedData['password_users']);

        User::create($validatedData);

        // User::create([
        //     'name_users' => $validatedData['name'],
        //     'username_users' => $validatedData['username'],
        //     'email_users' => $validatedData['email'],
        //     'password_users' => $validatedData['password_users'],
        // ]);

        // $request->session()->flash('success','Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
