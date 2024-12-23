@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">

    <h2>Comments</h2>
    <ul>
        @foreach ($post->comments as $comment)
            <li>
                <p><strong>{{ $comment->name }}</strong> ({{ $comment->email }})</p>
                <p>{{ $comment->content }}</p>
                @if($comment->image)
                    <img src="{{ asset('storage/' . $comment->image) }}" alt="Comment Image" class="img-thumbnail">
                @endif
            </li>
        @endforeach
    </ul>

    <h3>Add a Comment</h3>
    <form method="POST" action="{{ route('comments.store', $post) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>
@endsection
