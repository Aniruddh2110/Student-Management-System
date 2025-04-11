{{-- resources/views/students/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Student List</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Back to Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Add New Student</a>
    <form method="GET" action="{{ route('student.index') }}" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by name, PR no, roll no, or email" value="{{ $search ?? '' }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    @if(request()->has('search'))
        <p>Showing results for: <strong>{{ request()->input('search') }}</strong> 
            <a href="{{ route('student.index') }}" class="btn btn-sm btn-link">Clear</a>
        </p>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>PR No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roll No</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->pr_no }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->roll_no }}</td>
                <td>{{ $student->current_status }}</td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
