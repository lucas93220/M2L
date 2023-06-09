<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class M2LController extends Controller
{
    public function connexion()
    {
        $data = array();
        if (Session::has('login')){
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
        $password = $_POST['psw'];
        $request->validate([
            'psw'=>'required'
        ]);
        $current_user = session()->get('login');
        if($password == $_POST['psw2'] && $current_user->password == $password) {
            $current_user->setNom($_POST['nom']);
            $current_user->setPrenom($_POST['prenom']);
            $current_user->setEmail($_POST['email']);
            $current_user->setPassword($_POST['psw']);
            $current_user->setTelephone($_POST['tel']);
            $current_user->setPays($_POST['pays']);
            $current_user->setVille($_POST['ville']);
            $current_user->setUrlPhoto($_POST['urlPhoto']);
            $current_user->setField($_POST['field']);
            $current_user->setDateNaissance($_POST['dateNaissance']);
            $current_user->setSexe($_POST['sexe']);
            session()->put('login', $current_user);
            
            return view('config');
                }else{
                    return back()->with("fail", "Mot de passe incorrect.");
        }
    }

    public function loginUser(Request $request)
    {
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $request->validate([
            'email'=>'required|email'
        ]);

        $user = User::where('email','=',$email)->first();
        if($user){
            if($user != null && $password == $user->password){
                session_start();
                $request->session()->put('login', $user);
                return redirect('connected');
            }else{
                return back()->with('fail', 'Password not matches.');
            }
        }else{
            return back()->with('fail', 'This email is not registered.');
        }
    }
}
