<!-- resources/views/comments/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Add Comment</h2>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <label for="content">Content:</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
        <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
@endsection
