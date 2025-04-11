@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
        }
        .profile-card {
            border-radius: 1rem;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            margin: 40px auto;
            max-width: 900px;
        }
        .talks-table th, .talks-table td {
            vertical-align: middle;
        }
        .modal-body h5 {
            font-weight: 600;
        }
        .btn-outline-primary {
            border-radius: 0.5rem;
        }
        .btn-danger {
            border-radius: 0.5rem;
        }
        .table th {
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card profile-card p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="rounded-circle me-3" width="70" height="70">
                    <div>
                        <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                        <p class="mb-0 text-muted small">{{ Auth::user()->email }}</p>
                        <span class="badge bg-primary mt-1 text-capitalize">{{ Auth::user()->role }}</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#profileModal">View Profile</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profile Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">User Profile Details</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-3">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="rounded-circle mb-3" width="120" height="120">
                                <h5>{{ Auth::user()->name }}</h5>
                                <span class="badge bg-success text-capitalize">{{ Auth::user()->role }}</span>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless table-sm">
                                    <tr><th>Email:</th><td>{{ Auth::user()->email }}</td></tr>
                                    <tr><th>PR Number:</th><td>{{ $student->pr_no }}</td></tr>
                                    <tr><th>Phone:</th><td>{{ $student->ph_no ?? 'Not provided' }}</td></tr>
                                    <tr><th>Address:</th><td>{{ $student->address }}</td></tr>
                                    <tr><th>Roll No:</th><td>{{ $student->roll_no }}</td></tr>
                                    <tr><th>School 10th Name:</th><td>{{ $student->school_10th_name }}</td></tr>
                                    <tr><th>School 10th Address:</th><td>{{ $student->school_10th_address }}</td></tr>
                                    <tr><th>School 10th %:</th><td>{{ $student->school_10th_percentage }}</td></tr>
                                    <tr><th>School 12th Name:</th><td>{{ $student->school_12th_name }}</td></tr>
                                    <tr><th>School 12th Address:</th><td>{{ $student->school_12th_address }}</td></tr>
                                    <tr><th>School 12th %:</th><td>{{ $student->school_12th_percentage }}</td></tr>
                                    <tr><th>Bachelor College:</th><td>{{ $student->bachelor_college_name }}</td></tr>
                                    <tr><th>Bachelor Address:</th><td>{{ $student->bachelor_college_address }}</td></tr>
                                    <tr><th>Bachelor %:</th><td>{{ $student->bachelor_percentage }}</td></tr>
                                    <tr><th>Current Course:</th><td>{{ $student->current_course }}</td></tr>
                                    <tr><th>Current Status:</th><td>{{ $student->current_status }}</td></tr>
                                    <tr><th>Final Year Passed:</th><td>{{ $student->final_year_passed }}</td></tr>
                                    <tr><th>Registered On:</th><td>{{ Auth::user()->created_at->format('d M Y') }}</td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Talks Section -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Upcoming Talks</h5>
            </div>
            <div class="card-body">
                @if(count($talks) > 0)
                <div class="table-responsive">
                    <table class="table table-striped talks-table align-middle">
                        <thead class="table-light">
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
                                <td>{{ \Carbon\Carbon::parse($talk->date)->format('d M Y') }}</td>
                                <td>{{ $talk->time }}</td>
                                <td>{{ $talk->venue }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p class="text-muted">No talks available right now.</p>
                @endif
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
