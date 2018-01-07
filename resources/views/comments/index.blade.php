
@if (count($post_comments)>0)
    <hr>
    <div class="blog-comments">
        <ul class="list-group">
            @foreach ($post_comments as $k => $root_comments)
                <!--Выводим только родительские комментарии parent_id = 0-->

                @if ($k)
                    @break
                @endif

                @include ('comments.show', ['comments' => $root_comments])

            @endforeach
        </ul>
    </div><!-- /.blog-comments -->
@endif

