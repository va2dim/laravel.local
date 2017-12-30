@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta d-flex">
                <span class="mr-auto">
                {{ $post->created_at->diffForHumans() }} оставлен <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>&nbsp;&nbsp;
                <a href="/posts/{{$post->id}}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true" aria-label="Редактировать"></span></a>
                <a href="/posts/{{$post->id}}/delete"><span class="oi oi-delete" title="Удалить" aria-hidden="true" aria-label="Удалить"></span></a>
                </span>
                @foreach ($post->tags as $tag)
                    <a class="" href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
                @endforeach
            </p>
            <div>{{ $post->body }}</div>

        </div><!-- /.blog-post -->


        <hr>
        <div class="blog-comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li  class="list-group-item">
                <p class="blog-post-meta">{{ $comment->created_at->diffForHumans() }} оставлен <a href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a></p>
                <div class="blog-post-comment">{{ $comment->body }}</div>
                </li>
            @endforeach
        </div><!-- /.blog-comments -->

        <hr>
        <div class="card">
            <div class="card-block">
                <form action="/posts/{{$post->id}}/comments" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
                    <fieldset>



                        <!-- <legend>Cоздать комментарий</legend>

                        <div class="form-group">
                            <label for="__id" class="col-lg-1 control-label">ID</label>
                            <div class="col-lg-7">
                                <input class="form-control" readonly hidden type="number" id="__id" name="__id" placeholder="ID коммента" value="">
                            </div>

                            <label for="date" class="col-lg-2 col-lg-offset-1 control-label">Дата</label>
                            <div class="col-lg-2">
                                <input class="form-control" readonly hidden type="date" id="date" name="date" alt="Дата создания/изменения" value="">
                            </div>


                            <label for="text" class="col-lg-2 control-label">Текст</label>
                        -->
                        <br>

                        <div class="form-group">
                            <div class="col-lg-12">
                                @include('layouts.errors')
                                <textarea class="form-control" id="body" name="body" placeholder="Оставьте здесь свой комментарий"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="reset" class="btn btn-default">Cбросить</button>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>




    </div><!-- /.blog-main -->


@endsection