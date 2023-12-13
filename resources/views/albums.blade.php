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
            <h1>Explorer les albums</h1>
        </div>
        <div class="search">
            <form action="{{route('searchAlbums')}}" method="post">
                @csrf
                <input type="text" name="search" id="search" placeholder="Rechercher">
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <div class="searchDate">
            <form action="{{ route('searchAlbumsDate') }}" method="post">
                @csrf
                <select name="order" id="">
                    <option value="asc">Du plus ancien au plus récent</option>
                    <option value="desc">Du plus récent au plus ancien</option>
                </select>
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <div class="album-container">
            @foreach ($albums as $a)
            <div class="album">
                <div class="description">
                    <a href="{{route('album', ['id' => $a->id])}}">
                        @if($a->photos->isNotEmpty())
                        <img src="{{$a->photos->first()->url}}" alt="{{$a->titre}}">
                        @else 
                        <img src="https://picsum.photos/200" alt="{{$a->titre}}">
                        @endif
                        <h2 class="album-title">{{$a->titre}}
                        </h2>
                    </a>
                    <p class="creation">{{$a->creation}}</p>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
    @endsection


</body>

</html>