<!DOCTYPE html>
<html lang="en">
<head>

  
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Blog Berita ITC</title>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"> <h2>ITC News</h2> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Berita
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{route('berita.index')}}">Berita</a></li>
                      <li><a class="dropdown-item" href="{{route('berita.create')}}">Input Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{route('kategori.index')}}">Kategori</a></li>
                      <li><a class="dropdown-item" href="{{route('kategori.create')}}">Input Kategori</a></li>
                    </ul>
                </li>
                <a class="nav-link" href="#Log out">Log out</a>
            </div>
            </div>
        </div>
        </nav>
    <div class="container">
        
        @yield('content')
    </div>
    
</body>
</html>