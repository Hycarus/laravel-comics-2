@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('partials.hero')
    <main>
        <div class="container d-flex">
            <div class="row my-5">
                @foreach (config('comics.key') as $comic)
                    <div class="my-card col-12 col-md-4 col-lg-2">
                        <img src="{{ $comic['thumb'] }}" alt="{{ $comic['series'] }}">
                        <h3>{{ $comic['series'] }}</h3>
                    </div>
                @endforeach
            </div>
            <button>LOAD MORE</button>
        </div>
    </main>
    @include('partials.contacts')

@endsection
