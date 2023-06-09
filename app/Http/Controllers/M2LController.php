<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class M2LController extends Controller
{
    public function connexion()
    {
        $data = array();
        if (Session::has('login')) {
            $data = session()->get('login');
        }
        return view('connected', compact('data'));
    }

    public function list()
    {
        return view('list');
    }

    public function config(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $current_user = session()->get('login');
        $current_user->setNom($request->input('nom'));
        $current_user->setPrenom($request->input('prenom'));
        $current_user->setEmail($request->input('email'));
        $current_user->setPassword($request->input('password'));
        $current_user->setTelephone($request->input('tel'));
        $current_user->setPays($request->input('pays'));
        $current_user->setVille($request->input('ville'));
        $current_user->setUrlPhoto($request->input('urlPhoto'));
        $current_user->setField($request->input('field'));
        $current_user->setDateNaissance($request->input('dateNaissance'));
        $current_user->setSexe($request->input('sexe'));
        session()->put('login', $current_user);

        return view('config');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('psw');

        $user = User::where('email', '=', $email)->first();
        if ($user) {
            if ($password == $user->getPassword()) {
                $request->session()->put('login', $user);
                return redirect('connected');
            } else {
                return back()->with('fail', 'Le mot de passe est incorrect.');
            }
        } else {
            return back()->with('fail', "Cet email n'est pas enregistré.");
        }
    }
}
