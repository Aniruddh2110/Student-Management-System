@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Talk</h2>

    <form action="{{ route('talk.update', $talk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Talk Title</label>
            <input type="text" class="form-control" name="title" value="{{ $talk->title }}" required>
        </div>

        <div class="mb-3">
            <label for="speaker" class="form-label">Speaker</label>
            <input type="text" class="form-control" name="speaker" value="{{ $talk->speaker }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" value="{{ $talk->date }}" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" name="time" value="{{ $talk->time }}" required>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" class="form-control" name="venue" value="{{ $talk->venue }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Talk</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
