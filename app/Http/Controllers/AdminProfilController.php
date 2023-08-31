<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Cache;
use Illuminate\Support\Facades\Cache as FacadesCache;
// use App\Http\Controllers\Cache;
use Illuminate\Support\Facades\Hash;


class AdminProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // get all users from cache
        // $cachedUsers = json_decode(FacadesCache::get('isOnline', []), true);

        // $cachedUsers = FacadesCache::get('isOnline', []);


        // $count = count($cachedUsers);

        // return $count;
        $users = User::all();

        return view('dashboard.profil.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        // $user = User::all();

        // return view('dashboard.profil.edit', compact('user'));

        return view('dashboard.profil.edit', [

            'user' => $profil,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name_users' => 'required|max:255',
            'username_users' => ['required', 'min:3', 'max:255'],
            'phone_number_users' => 'required',
            'email_users' => 'required|email:dns',
            'password_users' => 'required|min:5|max:255'
        ]);

        $rules = [
            'name_users' => 'required|max:255',
            'phone_number_users' => 'required',
            'email_users' => 'required|email:dns',
            'password_users' => 'required|min:5|max:255'
        ];


        if ($request->username_users != $user->username_users) {
            $rules['username_users'] = 'required|unique:data_users';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['password'] = bcrypt($vaidatedData['password']);


        if (Hash::needsRehash($validatedData['password_users'])) {
            // Hashing ulang password karena algoritma hashing telah berubah
            $validatedData['password_users'] = Hash::make($validatedData['password_users']);
        }

        // $validatedData['password_users'] = Hash::make($validatedData['password_users']);

        // User::create($validatedData);
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/profil')->with('success', 'Profil has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        User::destroy($profil->id);

        return redirect('/dashboard/profil')->with('success', 'User has been deleted!');
    }
}
