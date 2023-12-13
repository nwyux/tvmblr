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
        <div class="infos-user">
            <div class="user"></div>
            <div class="avatar">
                <img src="{{$user->avatar}}" alt="">
            </div>
            <div class="infos">
                <h1>{{$user->name}}</h1>
            </div>
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
                    {{-- <div class="album-container">
                        @if($photos->isNotEmpty())
                            <p>Album :</p>
                                @foreach($photos as $photo)
                                    @if($photo->album)
                                        <p>{{ $photo->album->titre }}</p>
                                    @else
                                        <p>No album associated</p>
                                    @endif
                                @endforeach
                        @else
                            <p>No photos available</p>
                        @endif
                    </div> --}}
                    <div class="deleteAlbum">
                        <form action="{{route('deletePhoto', ['id' => $img->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    @endsection
</body>

</html>