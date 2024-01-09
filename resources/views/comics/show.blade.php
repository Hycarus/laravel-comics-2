@extends('layouts.app')

@section('title', 'Single Product')

@section('content')
    <main>
        <section class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $comic->title }}</h1>
                <div><a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary">Edit Comic</a></div>
            </div>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">{{ $comic->description }}</p>
                            <p>
                                Prezzo: {{ $comic->price }} | Data di Uscita: {{ $comic->sale_date }} | Tipo:
                                {{ $comic->type }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
