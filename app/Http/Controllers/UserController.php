<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirm' => 'required_with:password',
            'gender' => 'required|string',
            'position' => 'required|string',
            'phone' => 'required|string',
            'birthdate' => 'required|date',
            'city' => 'required|string',
            'country' => 'required|string',
            'profile_photo' => 'nullable|url',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->gender = $request->input('gender');
        $user->position = $request->input('position');
        $user->phone = $request->input('phone');
        $user->birthdate = $request->input('birthdate');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->profile_photo = $request->input('profile_photo');
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Valider les données du formulaire de modification du profil
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirm' => 'required_with:password',
            'gender' => 'required|string',
            'position' => 'required|string',
            'phone' => 'required|string',
            'birthdate' => 'required|date',
            'city' => 'required|string',
            'country' => 'required|string',
            'profile_photo	' => 'nullable|url',
        ]);

        // Mettre à jour les informations de l'utilisateur
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->gender = $validatedData['gender'];
        $user->position = $validatedData['position'];
        $user->phone = $validatedData['phone'];
        $user->birthdate = $validatedData['birthdate'];
        $user->city = $validatedData['city'];
        $user->country = $validatedData['country'];
        $user->profile_photo	 = $validatedData['profile_photo	'];

        $user->save();

        return redirect()->route('profile', ['id' => $user->id])->with('success', 'Profil mis à jour avec succès.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = User::where('name', 'like', "%$searchTerm%")
        ->orWhere('email', 'like', "%$searchTerm%")
        ->get();

        return view('liste', ['users' => $users, 'searchTerm' => $searchTerm]);
    }

    public function edit($id)
    {
        // Récupérer l'utilisateur à éditer en fonction de l'ID
        $user = User::find($id);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Utilisateur introuvable.');
        }

        // Afficher la vue d'édition avec les données de l'utilisateur
        return view('profile', compact('user'));
    }
}
