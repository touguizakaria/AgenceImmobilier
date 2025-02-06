@extends('admin.adminBase')

@section('title', $property->exists ? 'Modifier un bien' : 'Créer un nouveau bien' )

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            <div class="col" style="flex: 100">
                <div class="row">
                    @include('shared.input', ['class'=> 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
                    <div class="row col">
                        @include('shared.input', ['class'=> 'col', 'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
                        @include('shared.input', ['class'=> 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
                    </div>
                </div>

                <div class="row">
                    @include('shared.input', ['type'=> 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])
                </div>
                <div class="row">
                    @include('shared.input', ['class'=> 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                    @include('shared.input', ['class'=> 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                    @include('shared.input', ['class'=> 'col', 'label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
                </div>
                <div class="row">
                    @include('shared.input', ['class'=> 'col', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                    @include('shared.input', ['class'=> 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                    @include('shared.input', ['class'=> 'col', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
                </div>
                <div class="row">
                    @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
                </div>
                <div class="row">
                    @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold, 'options' => $options])
                </div>
            </div>

            <div class="col" style="flex: 25">
                @foreach($property->pictures as $picture)
                    <img src="{{ $picture->getImageUrl() }}" alt="" class="w-100 d-block">
                @endforeach

                @include('shared.upload', ['label' => 'Images', 'name' => 'pictures', 'multiple' => true])
            </div>
        </div>


        <div>
            <button class="btn btn-primary">@if($property->exists) Modifier @else Créer @endif</button>
        </div>
    </form>

@endsection
