@extends('base')

@section('title', 'Se connecter')

@section('content')

    <div class="container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form action="{{ route('login') }}" method="post">
            @csrf
            @include('shared.input', [
                'type' => 'email',
                'name' => 'email',
                'label' => 'Email',
            ])
            @include('shared.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Mot de passe',
            ])

            <div>
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
@endsection
