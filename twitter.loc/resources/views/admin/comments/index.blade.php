@extends('layouts.layout')

@section('title', 'Comments | Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Comments</h1>
            @include('shared.success-message')
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Idea</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $comment->user->id) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.show', $comment->idea) }}">
                                    {{ $comment->idea->id }}
                                </a>
                            </td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button style="text-decoration: underline;border:none;" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $comments->links() }}
        </div>
    </div>
@endsection
