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
            <h1>{{$photo->titre}}</h1>
        </div>
        <div class="search-container">
        
       
    </div>
        <div class="photo-container">
            <div class="photo">
                <div class="description">
                    <img src="{{$photo->url}}" alt="{{$photo->titre}}">
                    <h2>{{$photo->titre}}</h2>
                    <div class="photo-tags">
                    <p>Tags : </p>
                    @foreach ($photo->tags as $tag)
                    <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
                    @endforeach                </div>
                </div>
                <div class="album-container">
                    
                </div>
                
            </div>
        </div>
    </div>
    @endsection


</body>

</html>