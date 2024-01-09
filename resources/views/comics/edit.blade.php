@extends('layouts.app')

@section('title', 'Comic Edit')

@section('content')
    <main>
        <section class="container py-2 ">
            <h1>Edit: {{ $comic->title }}</h1>
            <form method="POST" action="{{ route('comics.update', $comic->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="text-white" for="title">Title</label>
                    <input type="text" class="form-control" value="{{ old('title', $comic->title) }}" id="title"
                        placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="description">Description</label>
                    <textarea type="text" class="form-control" rows="6" id="description" placeholder="Description"
                        name="description">{{ old('description', $comic->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="text-white" for="price">Price</label>
                    <input type="text" class="form-control" value="{{ old('price', $comic->price) }}" id="price"
                        placeholder="Price" name="price" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="type">Type</label>
                    <input type="text" class="form-control" value="{{ old('type', $comic->type) }}" id="type"
                        placeholder="Type" name="type" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('comics.index') }}" class="btn btn-secondary my-2" role="button">Return</a>
                </div>
            </form>
        </section>
    </main>

@endsection
