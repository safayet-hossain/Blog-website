@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a> 
                <small>in {{ $post->category->name }}</small>
            </li>
        @endforeach
    </ul>
</div>
@endsection
