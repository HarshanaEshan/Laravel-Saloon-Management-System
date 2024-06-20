<!-- resources/views/gallery/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Photo Gallery
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary float-right">Create Photo</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($photos as $photo)
                            <div class="col-md-4 mb-1" style="width:300px; height:300px">
                                <div class="card">
                                    <img src="{{ asset('img/' . $photo->image) }}" class="card-img-top" alt="{{ $photo->image }}" style="width:100%; height:130px" >
                                    <div class="card-body">
                                        <h5 class="card-title">Photo {{ $photo->id }}</h5>
                                        <form method="POST" action="{{ route('gallery.destroy', $photo->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this photo?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
