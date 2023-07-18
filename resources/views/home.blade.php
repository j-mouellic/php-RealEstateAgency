@extends('base')

@section('title')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Mon agence</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam dolores ab eum ea! Voluptatibus repellat
                quod minus unde. Ut praesentium cumque nesciunt rem aspernatur blanditiis asperiores ex similique quo!
                Possimus.</p>
        </div>
    </div>

    <div class="container">
        <h2>Biens disponibles</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('components.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
