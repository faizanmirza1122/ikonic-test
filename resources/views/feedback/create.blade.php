<!-- resources/views/feedback/create.blade.php -->

@extends('layouts.app')
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
@section('content')
    <div class="container mt-5">
        <h1>Create Feedback</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('feedbacks.store') }}" method="POST" class="col-md-6">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="bug">Bug Report</option>
                    <option value="feature">Feature Request</option>
                    <option value="improvement">Improvement</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
@endsection
