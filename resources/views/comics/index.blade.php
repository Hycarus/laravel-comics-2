@extends('layouts.app')

@section('title', 'Comics')

@section('content')
    <main>
        <section class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Comics</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('comics.create') }}" class="btn btn-primary me-3">Create new Comic</a>
                    <form action="{{ route('comics.index') }}" method="GET">
                        <select name="search" id="search">
                            <option value="" selected>All</option>
                            <option value="comic book">Comic Book</option>
                            <option value="graphic novel">Graphic Novel</option>
                        </select>
                        <button type="submit" class="btn btn-danger ms-3">Search</button>
                    </form>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="row gy-4">
                @foreach ($comics as $comic)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="card-text">{{ substr($comic->description, 0, 100) . '...' }}</p>
                                <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Show
                                    details</a>
                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cancel-button btn btn-danger "
                                        data-item-title="{{ $comic->title }}">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
    @include('partials.modal_delete')
@endsection
