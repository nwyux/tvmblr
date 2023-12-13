<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/app.css">
    <link rel="stylesheet" href="../../../css/login.css">
    <title>Tvmblr</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="login-form">
        <form action="{{route('loginT')}}" method="post">
            @csrf
            <h1>Se connecter</h1>
            <div class="txtb">
                <input type="text" name="name" id="name">
                <span data-placeholder="Name"></span>
            </div>
            <div class="txtb">
                <input type="password" name="password" id="password">
                <span data-placeholder="Mot de passe"></span>
            </div>
            <input type="submit" class="logbtn" value="Se connecter">
            <div class="bottom-text">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
    @endsection
</body>

</html>