@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="#">Author</a></p>
            <div>{{ $post->body }}</div>
        </div><!-- /.blog-post -->


        <hr>
        <div class="blog-comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li  class="list-group-item">
                <p class="blog-post-meta">{{ $comment->created_at->diffForHumans() }} </p>
                <div class="blog-post-comment">{{ $comment->body }}</div>
                </li>
            @endforeach
        </div><!-- /.blog-comments -->
    </div><!-- /.blog-main -->
@endsection