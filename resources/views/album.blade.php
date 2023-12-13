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
        <div class="title">
            <h1>{{$album->titre}}</h1>
        </div>
        <div class="search-container">
            <div class="container-tag">
                @foreach ($tags as $tag)
                <div class="tag">
                    <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
                </div>
                @endforeach
            </div>
            <div class="search">
                <form action="{{route('search')}}" method="post">
                    @csrf
                    <input type="text" name="search" id="search" placeholder="Rechercher">
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </div>
            <div class="photo-container">
                @foreach ($photos as $img)
                <div class="photo">
                    <div class="description">
                        <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}">
                        <h2>{{$img->titre}}</h2>
                        </a>
                        <div class="photo-tags">
                        <p>Tags : </p>
                        @foreach ($img->tags as $tag)
                        <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
                        @endforeach
                    </div>
                    </div>
                    <div class="album-container">
                        @if($photos->isNotEmpty())
                            <p>Album :</p>
                            <ul>
                                @foreach($photos as $photo)
                                    @if($photo->album)
                                        <li>{{ $photo->album->titre }}</li>
                                    @else
                                        <li>No album associated</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p>No photos available</p>
                        @endif
                    </div>
                    
                </div>
                @endforeach
            </div>
    </div>
    @endsection


</body>

</html>