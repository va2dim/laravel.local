<div class="card">
    @if ($quote->title)
        <div class="card-header">
            <h4 class="card-title"><a href="quotes\{{ $quote->id }}">{{ $quote->title }}</a></h4>
        </div>
    @endif
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{ $quote->body }}</p>
            @if ($quote->source_id)
                <footer class="blockquote-footer">
                    <a href="/quotes/?source={{ $quote->source_id }}">{{ $quote->source->item}}</a>.
                    <a class="card-link" href="/quotes/?author={{ $quote->author_id }}">{{ $quote->author->name }}</a>
                </footer>
            @endif
        </blockquote>
    </div>
    <div class="card-footer">
        Опубликовать {{ $quote->publicate_at }}
    </div>
</div><!-- /.blog-quote  ->toFormattedDateString()-->