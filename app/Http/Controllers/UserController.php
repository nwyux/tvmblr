<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
// Hashed
use Illuminate\Support\Facades\Hash;
use App\Models\Photo;
use App\Models\Tag;



use function Laravel\Prompts\alert;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function login()
    {
        return view('/login-register/login');
    }

    function loginT()
    {
        $name = request('name');
        $password = request('password');
        $user = DB::table('users')->where('name', $name)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                session(['user' => $user]);
                // Authentification
                Auth::loginUsingId($user->id);
                return redirect('/');
            } else {
                return back()->with('fail', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('fail', 'Aucun compte trouvé pour ce nom');
        }
    }

    function register()
    {
        return view('/login-register/register');
    }

    function registerT()
    {
        $newUsers = new \App\Models\User;
        $newUsers->name = request('name');
        $newUsers->email = request('email');
        $newUsers->password = Hash::make(request('password'));
        $newUsers->save();
        // Création d'une session
        session(['user' => $newUsers]);
        return redirect('/login');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function displayUser($id)
    {
        $user = User::find($id);
        $albums = Album::all();
        $photos = Photo::all();
        $tags = Tag::all();
        return view('user', ['user' => $user, 'albums' => $albums, 'photos' => $photos, 'tags' => $tags]);
    }
}
