@extends('layouts.app')

@section('content')
<a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Back to Dashboard</a>

<div class="container mt-4">
    <h2>Add New Talk</h2>

    <form action="{{ route('talk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Talk Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="speaker" class="form-label">Speaker</label>
            <input type="text" class="form-control" name="speaker" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" name="time" required>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" class="form-control" name="venue" required>
        </div>

        <button type="submit" class="btn btn-success">Create Talk</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
