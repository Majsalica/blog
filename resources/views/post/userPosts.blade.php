@extends('main')
@section('title', 'My posts')
@section('content')
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    Created at: {{ $post->created_at }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('show-post', ['post' => $post]) }}" class="btn btn-outline-primary">Show</a>
                    <a href="{{ route('edit-post', ['post' => $post]) }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ route('destroy-post', ['post' => $post]) }}" class="btn btn-outline-danger">Delete</a>
                </div>
                <div class="card-footer">
                    Updated at: {{ $post->updated_at }}
                    <br>
                    Created by: {{ $post->user->name }}
                </div>
            </div>
        @endforeach
    @else
        <h3>You ain't no post creator here! Ain't no cats here!</h3>
    @endif
@endsection

