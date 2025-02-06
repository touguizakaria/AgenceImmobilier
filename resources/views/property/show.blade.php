@extends('base')

@section('title', $property->title)

@section('content')

    <div class="container mt-4">

        <div class="row">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach($property->pictures as $k => $picture)
                        <div class="carousel-item {{ $k === 0 ? 'active' : '' }}">
                            <img src="{{ $picture->getImageUrl() }}" class="d-block w-100">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivante</span>
                    </button>
                </div>
            </div>

            <div class="col-4">
                <h1>{{ $property->title }}</h1>
                <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

                <div class="text-primary fw-bold" style="font-size: 4rem">
                    {{ number_format($property->price, thousands_separator: ' ') }} €
                </div>

                <hr>

                <div class="mt-4">
                    <h4>Intéressé par ce bien</h4>

                    @include('shared.flash')

                    <form action="{{ route('property.contact', ['property' => $property]) }}" method="post" class="vstack gap-3">
                        @csrf
                        <div class="row">
                            @include('shared.input', ['class'=> 'col', 'name' => 'firstname', 'label' => 'Prénom'])
                            @include('shared.input', ['class'=> 'col', 'name' => 'lastname', 'label' => 'Nom'])
                        </div>
                        <div class="row">
                            @include('shared.input', ['class'=> 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                            @include('shared.input', ['type'=> 'email', 'class'=> 'col', 'name' => 'email', 'label' => 'E-mail'])
                        </div>
                        @include('shared.input', ['type'=> 'textarea', 'label' => 'Votre message', 'name' => 'message'])

                        <div>
                            <button class="btn btn-primary">Nous contacter</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mt-4">
                    <p>{!! nl2br($property->description) !!}</p>
                    <div class="row">
                        <div class="col-8">
                            <h2>Caractéristiques</h2>
                            <table class="table table-striped">
                                <tr>
                                    <td>Surface habitable</td>
                                    <td>{{ $property->surface }} m²</td>
                                </tr>
                                <tr>
                                    <td>Pièces</td>
                                    <td>{{ $property->rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Chambres</td>
                                    <td>{{ $property->bedrooms }}</td>
                                </tr>
                                <tr>
                                    <td>Étage</td>
                                    <td>{{ $property->floor ?: 'Res de chaussé' }}</td>
                                </tr>
                                <tr>
                                    <td>Localisation</td>
                                    <td>{{ $property->address }},<br> {{ $property->postal_code }} {{ $property->city }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-4">
                            <h2>Spécificités</h2>
                            <ul class="list-group">
                                @foreach($property->options as $option)
                                    <li class="list-group-item">{{ $option->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
