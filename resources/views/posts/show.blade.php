@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta d-flex">
                <span class="mr-auto">
                {{ $post->created_at->diffForHumans() }} оставлен <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>&nbsp;&nbsp;
                <a href="/posts/{{ $post->id }}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true" aria-label="Редактировать"></span></a>
                <a href="/posts/{{ $post->id }}/delete"><span class="oi oi-x" title="Удалить" aria-hidden="true" aria-label="Удалить"></span></a>
                </span>
                @foreach ($post->tags as $tag)
                    <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
                @endforeach
            </p>
            <div>{{ $post->body }}<br>
                @if ($post->images)
                    @foreach (unserialize($post->images) as $image)
                        <img src="{{ asset('images/'.$image) }}" height="300">
                    @endforeach
                @endif
            </div>

        </div><!-- /.blog-post -->


@if(count($post->comments)>0)
        <hr>
        <div class="blog-comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li  class="list-group-item">
                    <p class="blog-post-meta">{{ $comment->created_at->diffForHumans() }} оставлен <a href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a></p>
                    <div class="blog-post-comment">{{ $comment->body }}</div>
                </li>
            @endforeach
        </div><!-- /.blog-comments -->
@endif

        @if (Auth::check())

            @include('comments.create')
        @else
            <div><a href="/login">Войдите</a> на сайт или <a href="/register">зарегистрируйтесь</a>, чтобы иметь возможность оставлять свои комментарии</div>
        @endif



    </div><!-- /.blog-main -->


@endsection