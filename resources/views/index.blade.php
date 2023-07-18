@extends('base')

@section('title', 'Vitrine des biens')

@section('content')

    <div class="bh-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" name="price" id="" placeholder="Buget Max" class="form-control"
                value="{{ $input['price'] ?? '' }}">
            <input type="number" name="surface" id="" placeholder="Surface minimale" class="form-control"
                value="{{ $input['surface'] ?? '' }}">
            <input type="number" name="rooms" id="" placeholder="Nombre de pièces minimum" class="form-control"
                value="{{ $input['rooms'] ?? '' }}">
            <input type="text" name="title" id="" placeholder="Nom du bien" class="form-control"
                value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-3">
                    @include('components.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection

<ul>

</ul>
