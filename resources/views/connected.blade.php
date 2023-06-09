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
        <link rel="stylesheet" href="{{asset('css/connected.css')}}">

        <!-- Styles -->
        
    </head>
    <body>
        <header>
            <a href="{{ url('/welcome')}}"><img src="{{asset('asset/intranet.png')}}" class="logo1" alt="">Intranet</a>
        <nav class="nav_btns">
            <ul class="nav_links">
                <li><a href="{{ url('/list')}}"><img src="{{asset('asset/list.png')}}" class="list_btn" alt="">Liste</a></li>
                <li><a class="prof_pic" href="{{ url('/config')}}"><img src="{{$user->getUrlPhoto()}}" alt=""></a></li>
                <li><a class="active-link" href="{{url('/')}}"><img src="{{asset('asset/connexion.png')}}" class="logo2" alt="">Déconnexion</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <section>
                <div>
                    <h1>Bienvenue sur l'intranet</h1>
                    <p>La plateforme de l'entreprise qui vous permet de retrouver tous vos collaborateurs.</p>
                    <h2>Avez-vous dit bonjour à :</h2>
                </div>
                @php 
            // Va chercher un utilisateur au hasard autre que celui connecté
            User::RandomCard(session()->get('login'));
            @endphp 
                <a href="" class="hello_btn">DIRE BONJOUR À QUELQU'UN D'AUTRE</a>
            </section>
        </main>
        
    </body>
</html>
