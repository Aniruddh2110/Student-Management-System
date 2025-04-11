{{-- resources/views/students/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Student</h2>

    <form method="POST" action="{{ route('student.update', $student->id) }}">
        @csrf
        @method('PUT')
        @include('student.form', ['student' => $student])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
