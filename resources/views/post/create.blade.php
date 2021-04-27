@extends('main')
@section('title', 'Create post')
@section('content')
    <h3>Create post</h3>
    <hr>
    <form method="post" action="{{ route('store-post') }}">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea rows="10" class="form-control" id="content" name="content" placeholder="Enter your content"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Create post</button>
    </form>
@endsection
