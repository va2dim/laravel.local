<div class="card">
    <div class="card-heading">
        <h4 class="card-title"><a href="quotes\{{ $quote->id }}">{{ $quote->title }}</a></h4>
    </div>
    <div class="card-body">
        {{ $quote->body }}
    </div>
    <div class="card-footer">
        <a href="/quotes/?author{{ $quote->author->id }}">{{ $quote->author->name }}</a>.
        <a href="{{ $quote->source_id }}">{{ $quote->source->item}}</a>
        Опубликовать {{ $quote->publicate_at }}
    </div>
</div><!-- /.blog-quote  ->toFormattedDateString()-->