@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $quote->author->category->title }}</h2>
            <div>{{ $quote->body }}</div>
            <p class="blog-post-meta">
                {{ $quote->publicate_at}}
                <a href="{{ $quote->author->id }}">{{ $quote->author->name }}</a>.
                <a href="{{ $quote->source_id }}">{{ $quote->source->item}}</a>
                (<a href="/author/category/{{ $quote->author->category->id}}">{{ $quote->author->category->title }}</a>)
            </p>
        </div><!-- /.blog-post -->





    </div><!-- /.blog-main -->


@endsection