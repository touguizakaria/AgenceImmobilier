@extends('base')

@section('title', 'Accueil')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi asperiores assumenda blanditiis commodi debitis
                dolorem doloremque dolores ducimus error, esse hic neque, placeat quae quam quod quos ratione sed.</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos dernières biens</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>

@endsection
