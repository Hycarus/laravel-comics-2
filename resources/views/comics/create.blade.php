@extends('layouts.app')

@section('title', 'Comic Create')

@section('content')
    <main>
        <form class="container py-2 " method="POST" action="{{ route('comics.store') }}">
            @csrf
            <div class="form-group">
                <label class="text-white" for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title"
                    name="title" required>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>

@endsection
