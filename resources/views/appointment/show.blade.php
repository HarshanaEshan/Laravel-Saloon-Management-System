<!-- resources/views/appointment/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Appointment Details</h1>

    <div>
        <strong>Title:</strong> {{ $appointment->title }} <br>
        <strong>Date:</strong> {{ $appointment->date }} <br>
        <strong>Time:</strong> {{ $appointment->time }} <br>
    </div>

    <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-primary mt-3">Edit</a>
    <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Delete</button>
    </form>
@endsection
