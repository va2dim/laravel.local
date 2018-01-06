@extends ('layouts.master')

@section ('content')

    @foreach ($tags as $tag)
        <strong><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>:</strong>
        <ul>
        @foreach($tag->posts as $post)
                <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
        @endforeach
        </ul>
    @endforeach


@endsection