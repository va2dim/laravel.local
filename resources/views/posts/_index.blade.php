@extends ('layout')

@section ('content')
    Welcome {{  }}!<br>

    @foreach($posts as $post)
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a><br>
    @endforeach

@endsection