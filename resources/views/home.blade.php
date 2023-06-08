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

                    {{ __('T\'est connecté !') }}
                </div>
                <div>
                    <h1>Bienvenue sur intranet</h1>
                        <small> La plate-forme de l'entreprise qui vous permet de trouver tous vos collaborateurs</small>
                            <h4>Avez-vous dit bonjour à :</h4>

                        @foreach ($users as $user)
                        <p class="pole">{{ $user->category }}</p>
            <figure>
                <img src="{{ $user->profile_picture }}">
                <figcaption>
                    <h3><strong>{{ $user->name }}, </strong>AFFICHER AGE</h3>
                    <p>{{ $user->city }}, {{ $user->country }}</p>
                    <ul>
                        <li><img src="asset/mail.png" alt=""><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                        <li><img src="asset/tel.png" alt=""><a href="">{{ $user->phone }}</a></li>
                        <li><img src="asset/cake.png" alt=""><a href="">{{ $user->birthdate }}</a></li>
                    </ul>
                </figcaption>
            </figure>
                        @endforeach

                        <div>
                            <button> DIRE BONJOUR À QUELQU'UN D'AUTRE</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







