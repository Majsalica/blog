@extends('main')
@section('title', 'Show post')
@section('content')
    <h3>{{ $post->title }}</h3>
    <hr>
    <p>{{ $post->content }}</p>
    <a href="{{ route('edit-post', ['post' => $post]) }}" class="btn btn-outline-secondary">Edit post</a>
    <a href="{{ route('destroy-post', ['post' => $post]) }}" class="btn btn-outline-danger">Delete post</a>
@endsection
