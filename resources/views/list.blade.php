@php
use App\Models\User;
$user = session()->get('login');
$users = User::where('email', '!=',session()->get('login')->getEmail())->get();
$userSafe = User::getAllUsers();
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
        <link rel="stylesheet" href="{{asset('css/list.css')}}">

        <!-- Styles -->
    </head>
    <body>
        <header>
            <a href="{{ url('/')}}"><img src="{{asset('asset/intranet.png')}}" class="logo1" alt="">Intranet</a>
        <nav class="nav_btns">
            <ul class="nav_links">
                <li><a href=""><img src="{{asset('asset/list.png')}}" class="list_btn" alt="">Liste</a></li>
                <li><a class="prof_pic" href="{{ url('/config')}}"><img src="{{$user->getUrlPhoto()}}" alt=""></a></li>
                <li><a class="active-link" href="./"><img src="{{asset('asset/connexion.png')}}" class="logo2" alt="">Déconnexion</a></li>
            </ul>
        </nav>
        </header>
        <main>
            <section>
                    <h1>Liste des collaborateurs</h1>
                    <fieldset>
                        <form action="">
                        <input type="text" placeholder="Recherche ...">
                        <label for="">Rechercher par :</label>
                        <select name="" id="">
                            <option value="">Nom</option>
                            <option value="">Prénom</option>
                            <option value="">Email</option>
                        </select>
                        <label for="">Catégorie :</label>
                        <select name="" id="">
                            <option value="">- Aucun -</option>
                            <option value="">Tous</option>
                            <option value="">Administrateur</option>
                            <option value="">Collaborateur</option>
                        </select>
                    </form>
                </fieldset>
                <ul class="prof_list">
                    @php
       foreach ($users as $user) {
        $user->getCard();
       }
        @endphp
                </ul>
                
            </section>
            
        </main>
        
    </body>
</html>
