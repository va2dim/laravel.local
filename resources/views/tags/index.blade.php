
    <strong>{{ $tag->name }}:</strong>
    <ol>
    @foreach($posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
    </ol>
