@extends('base')

@section('title', 'Tous nos biens')

@section('content')


    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <form action="" method="get" class="d-flex gap-2">
                <input type="number" name="surface" class="form-control" placeholder="Surface minimum" value="{{ $input['surface'] ?? '' }}">
                <input type="number" name="rooms" class="form-control" placeholder="Nombre de pièces minimum" value="{{ $input['rooms'] ?? '' }}">
                <input type="number" name="price" class="form-control" placeholder="Budget max" value="{{ $input['price'] ?? '' }}">
                <input type="text" name="title" class="form-control" placeholder="Mot clef" value="{{ $input['title'] ?? '' }}">

                <button class="btn btn-primary btn-sm flex-grow-0">
                    Rechercher
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    Aucun bien trouvé !
                </div>
            @endforelse
        </div>
        <div class="row my-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
