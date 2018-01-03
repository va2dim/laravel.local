<div class="card">
    @if ($quote->title)
        <div class="card-header">
            <h4 class="card-title"><a href="quotes\{{ $quote->id }}">{{ $quote->title }}</a></h4>
        </div>
    @endif
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{ $quote->body }}</p>
            <footer class="blockquote-footer">
                @if ($quote->source_id)
                        <a href="/quotes/?source={{ $quote->source_id }}">{{ $quote->source->item}}</a>.
                @endif
                @if ($quote->author_id)
                    <a class="card-link" href="/quotes/?author={{ $quote->author_id }}">{{ $quote->author->name }}</a>
                @endif
            </footer>
        </blockquote>
    </div>
    <div class="card-footer">
        Опубликовать {{ $quote->publicate_at }}
        <a href="/quotes/{{$quote->id}}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true"  aria-label="Редактировать"></span></a>
        <a href="/quotes/{{$quote->id}}/delete"><span class="oi oi-x" title="Удалить" aria-hidden="true" aria-label="Удалить"></span></a>
    </div>
</div><!-- /.blog-quote  ->toFormattedDateString()-->