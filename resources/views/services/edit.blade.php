<!-- resources/views/services/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Service</h1>

        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($service->image)
                    <p>Current Image:</p>
                    <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->description }}" style="max-width: 200px;">
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="topic">Topic:</label>
                <input type="text" name="topic" id="topic" class="form-control" value="{{ $service->topic }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $service->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
@endsection
