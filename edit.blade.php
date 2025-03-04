<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ff914d; /* Warm orange journal background */
            font-family: 'Georgia', serif;
        }
        .card {
            background: #fff8e1; /* Soft paper-like background */
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 25px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #d77a1e;
        }
        .btn-primary {
            background-color: #d77a1e;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #b86214;
        }
        h2 {
            color: #b86214;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card w-50">
            <h2 class="text-center mb-4">📖 Edit Journal</h2>
            <form action="{{ route('journals.update', $journal) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $journal->id }}">

                <div class="mb-3">
                    <label for="journal_name" class="form-label">Journal Name</label>
                    <input type="text" name="journal_name" class="form-control" value="{{ $journal->journal_name }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="journal_date" class="form-label">Date</label>
                        <input type="date" name="journal_date" class="form-control" value="{{ $journal->journal_date }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="journal_time" class="form-label">Time</label>
                        <input type="time" name="journal_time" class="form-control" value="{{ $journal->journal_time }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="journal_content" class="form-label">Journal Content</label>
                    <textarea name="journal_content" class="form-control" rows="5" required>{{ $journal->journal_content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Journal</button>
            </form>
        </div>
    </div>
</body>
</html>
