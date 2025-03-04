<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:rgb(235, 235, 235); 
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background:rgb(231, 231, 231); 
        }
        .btn-primary {
            background-color:rgb(235, 7, 7); 
            border: none;
            transition: 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color:rgb(218, 218, 218); 
            transform: scale(1.05);
        }
        .form-label {
            color:rgb(0, 0, 0); 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="text-center text-dark mb-4"> Create New Journal</h2>

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('journals.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="journal_name" class="form-label">Journal Name</label>
                            <input type="text" name="journal_name" class="form-control @error('journal_name') is-invalid @enderror" placeholder="Enter journal name" required value="{{ old('journal_name') }}">
                            @error('journal_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="journal_date" class="form-label">Journal Date</label>
                            <input type="date" name="journal_date" class="form-control @error('journal_date') is-invalid @enderror" required value="{{ old('journal_date') }}">
                            @error('journal_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="journal_time" class="form-label">Journal Time</label>
                            <input type="time" name="journal_time" class="form-control @error('journal_time') is-invalid @enderror" required value="{{ old('journal_time') }}">
                            @error('journal_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="journal_content" class="form-label">Description</label>
                            <textarea name="journal_content" class="form-control @error('journal_content') is-invalid @enderror" rows="3" placeholder="Write a journal content">{{ old('journal_content') }}</textarea>
                            @error('journal_content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100"> Create Journal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
