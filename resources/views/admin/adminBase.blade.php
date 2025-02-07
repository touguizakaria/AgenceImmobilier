<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Administration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4"></script>

    <style>
        .htmx-indicator{
            display:none;
        }
        .htmx-request .htmx-indicator{
            display:inline-block;
        }
        .htmx-request.htmx-indicator{
            display:inline-block;
        }
    </style>
</head>
<body>
@php
$routeName = request()->route()->getName();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($routeName, 'property.')]) href="{{ route('admin.property.index') }}">Gérer les biens</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($routeName, 'option.')]) href="{{ route('admin.option.index') }}">Gérer les options</a>
                </li>
            </ul>

            <div class="ms-auto">
                @auth()
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        @include('shared.flash')

        @yield('content')
    </div>


<script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {'title': 'Supprimer'}}})
</script>
</body>
</html>
