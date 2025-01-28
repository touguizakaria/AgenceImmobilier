@extends('base')

@section('title', 'Se connecter')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
            @csrf

            @include('shared.input', ['type'=> 'email', 'class'=> 'col', 'label' => 'E-mail', 'name' => 'email'])
            @include('shared.input', ['type'=> 'password', 'class'=> 'col', 'label' => 'Mot de passe', 'name' => 'password'])

            <div>
                <button class="btn btn-primary">Se connecter</button>
            </div>

        </form>

    </div>

@endsection
