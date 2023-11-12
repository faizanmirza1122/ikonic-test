<!-- resources/views/feedback/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Feedback</h1>

    <form action="{{ route('feedbacks.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $feedback->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required>{{ $feedback->description }}</textarea>

        <label for="category">Category:</label>
        <select name="category" id="category" class="form-control" required>
            <option value="bug">Bug Report</option>
            <option value="feature">Feature Request</option>
            <option value="improvement">Improvement</option>
        </select>
        <button type="submit" class="btn btn-primary">Update Feedback</button>
    </form>
@endsection
