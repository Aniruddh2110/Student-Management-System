<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger">🚪 Logout</button>
        </form>
    </div>
    
    <div class="text-center mb-4">
        <h1 class="fw-bold">🎓 Admin Dashboard</h1>
        <p class="text-muted">You are logged in as an admin.</p>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="adminTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard">Dashboard</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="students-tab" data-bs-toggle="tab" data-bs-target="#students">Student Records</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="talks-tab" data-bs-toggle="tab" data-bs-target="#talks">Talks</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="adminTabContent">

        <!-- Dashboard -->
        <div class="tab-pane fade show active" id="dashboard">
            <div class="card p-4">
                <h4 class="mb-3">📊 Welcome to the Dashboard</h4>
                <p>This is the main dashboard content where you can monitor activities.</p>
            </div>
        </div>

        <!-- Students -->
        <div class="tab-pane fade" id="students">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">👨‍🎓 Student Records</h4>
                    <a href="{{ route('student.index') }}" class="btn btn-outline-primary">🔧 Manage Students</a>
                </div>
                <form action="{{ route('sync.main') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Sync from Main DB</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Roll No</th>
                                <th>PR No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>10th %</th>
                                <th>12th %</th>
                                <th>Bachelor %</th>
                                <th>Current Course</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->roll_no }}</td>
                                <td>{{ $student->pr_no }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->ph_no }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->school_10th_percentage }}</td>
                                <td>{{ $student->school_12th_percentage }}</td>
                                <td>{{ $student->bachelor_percentage }}</td>
                                <td>{{ $student->current_course }}</td>
                                <td>{{ $student->current_status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Talks -->
        <div class="tab-pane fade" id="talks">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">🎤 Talks</h4>
                    <a href="{{ route('talk.create') }}" class="btn btn-success">➕ Add Talk</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Speaker</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($talks as $talk)
                            <tr>
                                <td>{{ $talk->title }}</td>
                                <td>{{ $talk->speaker }}</td>
                                <td>{{ $talk->date }}</td>
                                <td>{{ $talk->venue }}</td>
                                <td>
                                    <a href="{{ route('talk.edit', $talk->id) }}" class="btn btn-sm btn-warning me-1">✏️ Edit</a>
                                    <form action="{{ route('talk.destroy', $talk->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this talk?')">🗑️ Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
