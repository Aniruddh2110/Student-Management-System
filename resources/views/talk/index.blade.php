@extends('layouts.app')

@section('content')
<div class="container mt-4">


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{ asset('logo.png') }}" alt="Goa University Logo" width="30" height="30" class="d-inline-block align-text-top">
                Goa University
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('student/dashboard') }}" class="nav-link text-white fw-semibold">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-white fw-semibold">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link text-white fw-semibold">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('talk.index') }}">Talks</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stats">Stats</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>Talk List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Speaker</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
            </tr>
        </thead>
        <tbody>
            @foreach($talks as $talk)
                <tr>
                    <td>{{ $talk->title }}</td>
                    <td>{{ $talk->speaker }}</td>
                    <td>{{ $talk->date }}</td>
                    <td>{{ $talk->time }}</td>
                    <td>{{ $talk->venue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
