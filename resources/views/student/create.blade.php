
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Student</h2>

    <form method="POST" action="{{ route('student.store') }}">
        @csrf
        @include('student.form')
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
