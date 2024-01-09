@extends('layouts.app')

@section('title', 'Comic Create')

@section('content')
    <main>
        <section class="container py-2 ">
            <h1>Create: Comics</h1>
            <form method="POST" action="{{ route('comics.store') }}">
                @csrf
                <div class="form-group">
                    <label class="text-white" for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        placeholder="Title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white" for="description">Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        placeholder="Description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white" for="price">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                        placeholder="Price" name="price" required value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white" for="type">Type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                        placeholder="Type" name="type" required value="{{ old('type') }}">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white" for="series">Series</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                        placeholder="Series" name="series" required value="{{ old('series') }}">
                    @error('series')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white" for="sale_date">Sale date</label>
                    <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                        placeholder="Sale date" name="sale_date" required value="{{ old('sale_date') }}">
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('comics.index') }}" class="btn btn-secondary my-2" role="button">Return</a>
                </div>
            </form>
        </section>
    </main>

@endsection
