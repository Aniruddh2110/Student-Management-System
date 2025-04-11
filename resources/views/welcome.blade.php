<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goa University Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
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
    @auth
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p class="card-text"><strong>Role:</strong> {{ Auth::user()->role }}</p>
            <a href="{{ url('/logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="btn btn-danger mt-3">
               Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endauth

@guest
    <div class="alert alert-info">You're not logged in. <a href="{{ route('login') }}">Login here</a>.</div>
@endguest
    <!-- Hero / Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100" alt="Event 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Annual Tech Fest</h5>
                    <p>Explore innovations and competitions at Goa University</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" alt="Event 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Career Guidance Week</h5>
                    <p>Get mentored by top industry experts</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Why Choose Us?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">All Events in One Place</h5>
                            <p class="card-text">Find all upcoming academic and cultural events across departments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">Real-Time Updates</h5>
                            <p class="card-text">Stay notified about talk changes and new announcements instantly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">Student Friendly</h5>
                            <p class="card-text">Bookmark, register, and manage your events easily with your login.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="stats" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Goa University At a Glance</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <h1 class="display-4 fw-bold">30+</h1>
                    <p>Departments</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 fw-bold">500+</h1>
                    <p>Events Hosted</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 fw-bold">10k+</h1>
                    <p>Students Participated</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 fw-bold">100+</h1>
                    <p>Guest Speakers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        &copy; {{ date('Y') }} Goa University. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
