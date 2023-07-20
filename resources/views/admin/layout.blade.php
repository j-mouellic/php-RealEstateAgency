<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Mon Agence</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
            $route = request()
                ->route()
                ->getName();
        @endphp
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a @class(['nav-link', 'active' => str_contains($route, 'property.')]) href="{{ route('admin.property.index') }}">Mes biens</a>
                <a @class(['nav-link', 'active' => str_contains($route, 'option.')]) href="{{ route('admin.option.index') }}">Mes options</a>
            </div>
            <div class="ms-auto">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" methode="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @include('shared.flash')
        @yield('content')
    </div>

    <script>
        new TomSelect('select[multiple]', {
            plugins: {
                remove_button: {
                    title: 'Supprimer'
                }
            }
        })
    </script>
</body>

</html>
