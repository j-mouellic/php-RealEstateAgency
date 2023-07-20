<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Contact</title>
</head>

<body>
    <h1>Nouveau contact</h1>
    <br>
    <p>vous avez reçu une nouvelle demande de contact pour le bien : <a target="_blank"
            href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
            {{ $property->title }}</a></p>
    <br>
    <h2>Coordonnées du contact :</h2>
    <br>
    <p>Prénom : {{ $data['firstname'] }}</p>
    <p>Nom : {{ $data['lastname'] }}</p>
    <p>Téléphone : {{ $data['phone'] }}</p>
    <p>Email : {{ $data['email'] }}</p>
    <br>
    <h2>Message :</h2>
    <p>{{ $data['message'] }}</p>
</body>

</html>
