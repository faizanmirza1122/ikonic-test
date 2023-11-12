<!-- resources/views/feedback/show.blade.php -->

@extends('layouts.app')

<head>
    <style>
        .mention-suggestion {
            padding: 5px;
            cursor: pointer;
        }

        .mention-suggestion:hover {
            background-color: #eee;
        }
    </style>
</head>
@section('content')
    <div class="container mt-5">
        <!-- resources/views/feedback/show.blade.php -->

        <h1>{{ $feedback->title }}</h1>
        <p>Description: {{ $feedback->description }}</p>
        <!-- Display other feedback details -->

        <h2>Comments</h2>
        <!-- resources/views/feedback/show.blade.php -->

        <!-- ... -->

        <ul class="list-group">
            @foreach ($feedback->comments as $comment)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $comment->user->name }}</strong>
                            @if ($comment->mentioned_user_id)
                                mentioned: <strong>{{ $comment->mentionedUser->name }}</strong>
                            @endif
                            ({{ $comment->created_at->diffForHumans() }})
                            :
                            {!! nl2br(e($comment->content)) !!}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('comments.store') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">

            {{-- <div class="mb-3">
                <label for="content" class="form-label">Add Comment:</label>
                <textarea name="content" id="content" class="form-control" required></textarea>

                <!-- Mention input field -->
                

                <!-- Mention suggestions container -->
               
            </div> --}}

            <div class="mb-3">
                <label for="content" class="form-label">Add Comment:</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
        
                <!-- Emoji button and picker container -->
                <div class="d-flex mt-2">
                    <button type="button" id="emoji-button" class="btn btn-secondary">😊 Emoji</button>
                    <div id="emoji-picker"></div>
                </div>

                <div class="mt-2">
                    <label for="mention" class="form-label">Mention:</label>
                    <input type="text" name="mention" id="mention" class="form-control">
                </div>
                <div id="mention-suggestions"></div>
            </div>

            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>

    </div>
@endsection
<script>
    // public/js/mention.js

    // public/js/mention.js

    document.addEventListener('DOMContentLoaded', function() {
        const mentionInput = document.getElementById('mention');
        const usersList = ['faizan', 'test']; // Replace with your user list

        mentionInput.addEventListener('input', function() {
            const inputValue = mentionInput.value.toLowerCase();
            const suggestions = usersList.filter(user => user.toLowerCase().includes(inputValue));

            // Display suggestions
            displaySuggestions(suggestions);
        });

        function displaySuggestions(suggestions) {
            const suggestionsContainer = document.getElementById('mention-suggestions');

            if (!suggestionsContainer) {
                console.error('Mention suggestions container not found.');
                return;
            }

            // Clear previous suggestions
            suggestionsContainer.innerHTML = '';

            // Display new suggestions
            suggestions.forEach(user => {
                const suggestionItem = document.createElement('div');
                suggestionItem.textContent = user;
                suggestionItem.classList.add('mention-suggestion');

                suggestionItem.addEventListener('click', function() {
                    mentionInput.value = user;
                    suggestionsContainer.innerHTML = '';
                });

                suggestionsContainer.appendChild(suggestionItem);
            });
        }
    });

    
</script>
