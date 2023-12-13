<html>

<head>
    <title>Tvmblr</title>
    <link rel="stylesheet" href="../../../css/nav.css">
    <script></script>
</head>

<body>
    <div class="global-container">
        <main class="main-content">
            <header class="top">
                <div class="header-content">
                <div class="logo-nom">
                    <a href="{{route('index')}}">
                        <h1>Tvmblr</h1>
                    </a>

                </div>
                <div class="menu">
                    <nav>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                            <hr class="separator">
                            <li><a href="{{route('register')}}">S'inscrire</a></li>
                            @endguest
                            @auth
                            <li><a href="{{route('index')}}">Accueil</a></li>
                            <hr class="separator">
                            <li><a href="{{route('albums')}}">Albums</a></li>
                            <hr class="separator">
                            <li><a href="{{route('Dashboard')}}">Dashboard</a></li>
                            <hr class="separator">
                            <li><a href="{{route('user', ['id' => session('user')->id])}}">
                                    {{session('user')->name}}
                                </a>
                            </li>
                            <hr class="separator">
                            <li><a href=" {{route('logout')}}">Déconnexion</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
                </div>
            </header>
            @section('content')
            @show
        </main>
    </div>
</body>

</html>