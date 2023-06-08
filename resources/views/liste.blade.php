@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div>
                    <h1>Liste des collaborateurs</h1>
                        <div>
                            <div>
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="search" placeholder="Search..." required>
                                    <button type="submit">Search</button>
                                </form>
                            </div>

                            <div>
                                Rechercher par :
                                <select id="">
                                    <option value="volvo">Nom</option>
                                    <option value="saab">Prénom</option>
                                    <option value="vw">Age</option>
                                </select>
                            </div>

                            <div>
                                Catégorie :
                                <select id="">
                                    <option value="volvo">Cadre</option>
                                    <option value="saab">salarié</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <br>


                        <div>
                            <h1>Resultat pour la recherche "{{ $searchTerm }}"</h1>

                            @if ($users->count() > 0)
                                <ul>
                                    @foreach ($users as $user)
                                        <li>{{ $user->name }} -
                                            {{ $user->email }}
                                        </li>

                                        <li></li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ $searchTerm }} ne fait pas partie de nos collaborateurs</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
