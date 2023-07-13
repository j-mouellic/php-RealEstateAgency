@extends('admin.layout')

@section('title', $property->exists ? 'Éditer un bien' : 'Créer un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'patch' : 'post')

        <div class="">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre du bien',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="row">
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Surface',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'class' => 'col',
            'type' => 'textarea',
            'label' => 'Description',
            'name' => 'description',
            'value' => $property->description,
        ])

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Nombre de pièces',
                'name' => 'rooms',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Nombre de chambres',
                'name' => 'bedrooms',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => "Nombre d'étages",
                'name' => 'floor',
                'value' => $property->floor,
            ])
        </div>

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Code postal',
                'name' => 'postal_code',
                'value' => $property->postal_code,
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Ville',
                'name' => 'city',
                'value' => $property->city,
            ])
        </div>

        @include('shared.checkbox', [
            'name' => 'sold',
            'label' => 'vendu',
            'value' => $property->sold,
        ])
        <div class="">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
