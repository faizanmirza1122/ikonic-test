<!-- resources/views/feedback/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Feedback List</h1>

        <a href="{{ route('feedbacks.create') }}" class="btn btn-success mb-3">Create Feedback</a>
        {{-- <a href="{{ route('comments.show') }}" class="btn btn-success mb-3">Comment By USer</a> --}}
        
        <ul class="list-group">
            @foreach($feedbacks as $feedback)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('feedbacks.show', $feedback->id) }}">{{ $feedback->title }}</a>
                            by {{ $feedback->user->name }}
                            ({{ $feedback->votes }} votes)
                        </div>
                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            <p style="color:red">If u want to comment on any feedback pls click on their feeback name</p>

        {{ $feedbacks->links() }}
    </div>
@endsection
