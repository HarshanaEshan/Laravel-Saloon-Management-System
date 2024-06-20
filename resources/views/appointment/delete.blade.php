<!-- resources/views/appointment/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Delete Appointment</h1>

    <p>Are you sure you want to delete the appointment with title: <strong>{{ $appointment->title }}</strong>?</p>

    <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="{{ route('appointment.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
