<div class="blog-post">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} <!-- or standart toFormattedDateString()-->
        оставлен <a href="blogs/{{ $post->user->name }}">{{ $post->user->name }}</a>
        <a href="/posts/{{$post->id}}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true"  aria-label="Редактировать"></span></a>
        <a href="/posts/{{$post->id}}/delete"><span class="oi oi-delete" title="Удалить" aria-hidden="true" aria-label="Удалить"></span></a>
    </p>
</div><!-- /.blog-post -->