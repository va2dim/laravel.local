<div class="blog-post">
    <h2 class="blog-post-title"><a href="posts\{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} <!-- or standart toFormattedDateString()--> оставлен <a href="{{ $post->user->id }}">{{ $post->user->name }}</a></p>
    <div>{{ $post->body }}</div>
</div><!-- /.blog-post -->