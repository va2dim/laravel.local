@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

    <h1>Добавить цитату</h1>

    <form action="/quotes" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

        @include('layouts.errors')

        <!-- <legend>Cоздать пост</legend> -->
        <div class="form-group">
            <label for="__id" class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="__id" name="__id" placeholder="ID цитаты" value="">
            </div>
<!--
            <label for="user_id" class="col-lg-1 control-label">ID пользователя</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="user_id" name="user_id" placeholder="ID пользователя" value="auth()->user->id">
            </div>
-->
            <label for="date" class="col-lg-4 col-lg-offset-1 control-label">Дата публикации</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="publicate_at" placeholder="Дата публикации" value="{{ date('Y-m-d') }}">
            </div>



            <label for="hub" class="col-lg-1 control-label">Жанр</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="hub" name="hub" placeholder="Жанр/категория/хаб" value="">
            </div>

            <label for="title" class="col-lg-1 control-label">Заголовок</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок" value="">
            </div>

            <label for="body" class="col-lg-1 control-label">Текст</label>
            <div class="col-lg-11">
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>

            <label for="author" class="col-lg-1 control-label">Автор</label>
            <div class="col-lg-11">
                <div class="input-group">
                    <input class="form-control" type="text" id="author" name="author" placeholder="Добавить нового автора" value="">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">+</button>
                    </span>

                <select class="custom-select" id="author" name="author">
                    <option value="">Выберите автора</option>
                    @include('quotes.authors')
                </select>



                </div>
            </div>

            <label for="source" class="col-lg-1 control-label">Источник</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="source" name="source" placeholder="Источник" value="">
            </div>

            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
                    <button type="reset" class="btn btn-default">Cбросить</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </div>


        </div>
        </fieldset>
    </form>


    </div>

@endsection