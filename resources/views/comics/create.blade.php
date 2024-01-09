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
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label class="text-white" for="price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Price" name="price" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="type">Type</label>
                    <input type="text" class="form-control" id="type" placeholder="Type" name="type" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="series">Series</label>
                    <input type="text" class="form-control" id="series" placeholder="Series" name="series" required>
                </div>
                <div class="form-group">
                    <label class="text-white" for="sale_date">Sale date</label>
                    <input type="text" class="form-control" id="sale_date" placeholder="Sale date" name="sale_date"
                        required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('comics.index') }}" class="btn btn-secondary my-2" role="button">Return</a>
                </div>
            </form>
        </section>
    </main>

@endsection
