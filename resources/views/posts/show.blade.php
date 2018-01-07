@extends('layouts.master')

@section('content')

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta d-flex">
                <span class="mr-auto">
                {{ $post->created_at->diffForHumans() }} оставлен <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>&nbsp;&nbsp;
                <a href="/posts/{{ $post->slug }}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true" aria-label="Редактировать"></span></a>
                <a href="/posts/{{ $post->slug }}/delete"><span class="oi oi-x" title="Удалить" aria-hidden="true" aria-label="Удалить"></span></a>
                </span>

            </p>
            <div>{{ $post->body }}<br>
                @if ($post->images)
                    @foreach (unserialize($post->images) as $image)
                        <img src="{{ asset('images/'.$image) }}" height="300">
                    @endforeach
                @endif
            </div>
            <span>
                @foreach ($post->tags as $tag)
                    <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
                @endforeach
            </span>
        </div><!-- /.blog-post -->


        @include('comments.index')
        @if (Auth::check())
            @include('comments.create')
        @else
            <div><a href="/login">Войдите</a> на сайт или <a href="/register">зарегистрируйтесь</a>, чтобы иметь возможность оставлять свои комментарии</div>
        @endif

@endsection