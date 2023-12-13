<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>Tvmblr</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="container">
        <div class="form-photos">
            <h1>Ajouter une photo</h1>
            <form action="{{ route('NewPhotoT') }}" method="POST">
                @csrf
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">
                <label for="url">Url</label>
                <input type="text" name="url" id="url">
                
                <select name="tag[]" id="" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->nom }}</option>
                    @endforeach
                </select>
                
                <select name="album" id="">
                    @foreach ($albums as $a)
                        <option value="{{ $a->id }}">{{ $a->titre }}</option>
                    @endforeach
                </select>
            
                <input type="submit" value="Envoyer">
            </form>
            
            <form action="{{route('NewTag')}}" method="POST">
                @csrf
                <label for="Tag">Nouveau Tag</label>
                <input type="text" name="NewTag">
                <input type="submit" value="Ajouter un tag">

            </form>

            <form action="{{route('NewAlbumT')}}" method="POST">
                @csrf
                <label for="Album">Nouvel Album</label>
                <input type="text" name="titre" id="titre">
                <input type="submit" value="Ajouter un album">
            </form>
        </div>
    </div>
    @endsection

</body>

</html>