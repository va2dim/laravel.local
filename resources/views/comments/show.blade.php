@foreach ($comments as $comment)

    <li class="list-group-item" style="margin-left:{{ ($loop->depth-2)*20 }}px;">
        <div class="blog-post-comment">
            <p class="blog-post-meta">{{ ($loop->depth-2)  }}: {{ $comment->id.' '.$comment->parent_id.' | ' }}
                {{ $comment->created_at->diffForHumans() }} оставлен <a href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
            </p>
            <p>{{ $comment->body }}</p>
            <div align="right">
                <a href="#respond" onclick="selectCommmentedComment('{{ $comment->id }}', 'Вы можете оставить свой ответ на комментарий: {{ $comment->body }}' )">Ответить</a>
            </div>
        </div>
    </li>

    @if (isSet($post_comments[$comment->id]))

        @include ('comments.show', ['comments' => $post_comments[$comment->id]])
    @endif

@endforeach