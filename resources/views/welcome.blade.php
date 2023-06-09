<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intranet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        <!-- Styles -->
        
    </head>
    <body>
        <header>
            <a href="{{ url('/welcome')}}"><img src="{{asset('asset/intranet.png')}}" class="logo1" alt="">Intranet</a>
        <nav class="nav_btns">
            <ul class="nav_links">
                <li><a class="active-link" href="{{ url('/')}}"><img src="{{asset('asset/connexion.png')}}" class="logo2" alt="">Connexion</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <section id="connexion">

                <div>
                    <h1>Connexion</h1>
                </div>
    
                    <fieldset class="formulaire">
                        <p>Pour vous connecter à l'intranet, entrez votre identifiant et mot de passe</p>
                        <form action="{{route('login-user')}}" method="post">
                            @if (Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                        <label for="email">Mail ou login :</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" aria-required="true"><br>
                            <span class="text-danger">@error('mail') {{$message}} @enderror</span>
                        <label for="email">Mot de passe :</label>
                        <input type="password" id="password" name="psw" placeholder="Password" aria-required="true" required>
                        
                        <div class="button">
                            <input type="submit" value="CONNEXION">
                        </div>
                        </form>
                    </fieldset>
            </section>
        </main>
        
    </body>
</html>
