@extends('layouts.app')

@section('content')
    <h1>List</h1>
    <a href="{{ route('notes-create') }}" class="btn btn-primary">Create New Post</a>
    <ul class="list-group mt-3">
        @foreach ($notes as $note)
            <li>
                <a href="{{ route('notes-show', $note->id) }}">{{ $note->title }}</a>
                <a href="{{ route('notes-edit', $note->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('notes-destroy', $note->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <!-- Pagination Links -->
{{ $notes->links() }}
@endsection
