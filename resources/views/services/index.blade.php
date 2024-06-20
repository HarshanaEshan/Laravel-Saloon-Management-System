<!-- resources/views/services/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Services</h1>
            <a href="{{ route('services.create') }}" class="btn btn-primary">Create Service</a>
        </div>

        @if ($services->isEmpty())
            <p>No services found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Topic</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td><img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->description }}" style="max-width: 100px;"></td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->topic }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
