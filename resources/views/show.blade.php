@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container">

        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>


        <div class="text-primary">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>

        <hr>

        <div class="mt-4">
            <h4>Contacter l'agence pour une visite</h4>

            <form action="" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [
                        'name' => 'firstname',
                        'label' => 'Prénom',
                    ])
                    @include('shared.input', [
                        'name' => 'lastname',
                        'label' => 'Nom',
                    ])
                </div>

                <div class="row">
                    @include('shared.input', [
                        'name' => 'phone',
                        'label' => 'Téléphone',
                    ])
                    @include('shared.input', [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                    ])
                </div>

                @include('shared.input', [
                    'type' => 'textarea',
                    'name' => 'message',
                    'label' => 'Votre messsage',
                ])

                <div>
                    <button class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <h2>Description</h2>
            <p>{{ $property->description }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-strpied">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Nombre de pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Nbre de chambre</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Nbre d'étage</td>
                            <td>{{ $property->floor ?: 'Rez-de-chaussée' }} </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
