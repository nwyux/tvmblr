<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>Tvmblr</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    @extends('layouts.nav')
    @section('content')

    <div class="container">
        <div class="title">
            <h1>Explorer toutes les photos</h1>
        </div>
        <div class="search-container">
        <div class="container-tag">
            @foreach ($tags as $tag)
            <div class="tag">
                <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
            </div>
            @endforeach
        </div>
        <form action="{{route('explorerT')}}" method="POST" class="notes">
            @csrf
            <select name="search" id="">
                <option value="1">1⭐️</option>
                <option value="2">2⭐️</option>
                <option value="3">3⭐️</option>
                <option value="4">4⭐️</option>
                <option value="5">5⭐️</option>
            </select>
            <input type="submit" value="Rechercher">
        </form>
        <div class="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" name="search" id="search" placeholder="Rechercher">
                <button type="submit">Rechercher</button>
            </form>
        </div>
    </div>
    <div class="photo-container">
        @php
            $shuffledPhotos = $photos->shuffle();
        @endphp
    
        @foreach ($shuffledPhotos as $img)
        <div class="photo" data-photo-url="{{ $img->url }}">
            <div class="description">
                    {{-- <a href="{{route('photo', ['id' => $img->id])}}"> --}}
                        <img src="{{$img->url}}" alt="{{$img->titre}}" class="photo">
                        <h2>{{$img->titre}}</h2>
                    {{-- </a> --}}
                    <div class="photo-tags">
                        <p>Tags : </p>
                        @foreach ($img->tags as $tag)
                            <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal hidden">
        <div class="img-container">
        <img src="" alt="" class="modal-img">
    </div>
        <div class="modal-close">X</div>
    </div>
    
</div>
    @endsection

</body>

</html>
