<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal De System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: rgba(237, 253, 238, 0.41);
        }
        .navbar {
            background-color: rgb(240, 117, 69) !important;
        }
        .navbar-brand, .navbar a {
            color: #fff !important;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table-hover tbody tr:hover {
            background-color: rgb(255, 229, 214);
        }
        .btn-pink {
            background-color: rgb(47, 211, 129);
            border-color: rgb(47, 211, 129);
            color: white;
        }
        .btn-pink:hover {
            background-color: rgb(47, 211, 129);
        }
        .btn-danger:hover {
            background-color: rgb(47, 211, 129);
        }
        .alert-success {
            background-color: rgb(47, 211, 129);
            color: rgb(128, 0, 0);
            border-color: rgb(68, 64, 66);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Tet Journal</a>
            
            <!-- Right Side of Navbar -->
            <div class="d-flex">
                <!-- Add Journal Button -->
                <a href="{{ route('journals.create') }}" class="btn btn-success me-2">
                    <i class="bi bi-plus-circle"></i> Add Journal
                </a>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card p-4">
            <h2 class="mb-3 text-center text-pink">Upcoming Journals</h2>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Journals Table -->
            <table class="table table-striped table-hover">
                <thead style="background-color: rgba(150, 209, 126, 0.85); color: white;">
                    <tr>
                        <th>Journal Name</th>
                        <th>Journal Date</th>
                        <th>Journal Time</th>
                        <th>Description</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        <tr>
                            <td><strong>{{ $journal->journal_name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($journal->journal_date)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($journal->journal_time)->format('h:i A') }}</td>
                            <td>{{ $journal->journal_content ?? 'no journal content' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- No Journals Message -->
            @if($journals->isEmpty())
                <p class="text-center text-muted mt-3">No journals available. <a href="{{ route('journals.create') }}">Create one?</a></p>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
