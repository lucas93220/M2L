@php
use App\Models\User;
$user = session()->get('login');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intranet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/config.css')}}">

        <!-- Styles -->
        
    </head>
    <body>
        <header>
            <a href="{{ url('/connected')}}"><img src="{{asset('asset/intranet.png')}}" class="logo1" alt="">Intranet</a>
        <nav class="nav_btns">
            <ul class="nav_links">
                <li><a href="{{ url('/list')}}"><img src="{{asset('asset/list.png')}}" class="list_btn" alt="">Liste</a></li>
                <li><a class="prof_pic" href="{{ url('/config')}}"><img src="{{$user->getUrlPhoto()}}" alt=""></a></li>
                <li><a class="active-link" href="{{ url('/')}}"><img src="{{asset('asset/connexion.png')}}" class="logo2" alt="">Déconnexion</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <h1>Modifier mon profil</h1>
            <fieldset class="config">
                <form action="{{route('config-user')}}" method="POST">
                    @csrf
                    <label for=""><sup>*</sup>Civilité :</label>
                    <select name="sexe" id="sexe">
                        <option value="M">M.</option>
                        <option value="Mme">Mme</option>
                    </select>
                    <label for=""><sup>*</sup>Categorie</label>
                    <select name="field" id=""field>
                        <option value="client">Client</option>
                        <option value="Technique">Technique</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                    <label for=""><sup>*</sup>Nom :</label>
                    <input type="text" name="nom" id="nom" value="{{$user->getNom()}}">
                    <label for=""><sup>*</sup>Prénom :</label>
                    <input type="text" name="prenom" id="prenom"value="{{$user->getPrenom()}}">
                    <label for=""><sup>*</sup>Email :</label>
                    <input type="email" name="email" id="email" value="{{$user->getEmail()}}">
                    <label for="">Mot de passe :</label>
                    <input type="password" name="psw" id="psw" placeholder="(min. 8 charactères)" aria-required="true" required>
                    <label for="">Confirmation :</label>
                    <input type="password" name="psw2" id="psw2" placeholder="(min. 8 charactères)" aria-required="true" required>
                    <label for=""><sup>*</sup> Téléphone :</label>
                    <input type="tel" name="tel" id="tel" value="{{$user->getTelephone()}}">
                    <label for="">Date de naisance :</label>
                    <input type="date" name="dateNaissance" id="dateNaissance" value="{{$user->getDateNaissance()}}">
                    <label for=""><sup>*</sup> Ville :</label>
                    <input type="text" name="ville" id="ville" value="{{$user->getVille()}}">
                    <label for=""><sup>*</sup> Code Pays :</label>
                    <input type="text" name="pays" id="pays" value="{{$user->getPays()}}">
                    <label for="">URL de la photo :</label>
                    <input type="text" name="urlPhoto" id="urlPhoto" value="{{$user->getUrlPhoto()}}">
                    <input type="submit" value="MODIFIER">
                </form>
                @if (Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
            </fieldset>
        </main>
        
    </body>
</html>
