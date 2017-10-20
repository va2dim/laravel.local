@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

    <h1>Cоздать пост</h1>

    <form action="/posts" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>
        <legend>Add post</legend>
        <div class="form-group">
            <label for="__id" class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="__id" name="__id" placeholder="ID новости" value="">

            </div>

            <label for="date" class="col-lg-1 col-lg-offset-1 control-label">Дата</label>
            <div class="col-lg-2">
                <input class="form-control" type="date" id="date" name="date" placeholder="Дата создания/изменения" value="">
            </div>

            <label for="title" class="col-lg-1 control-label">Заголовок</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="title" name="title" placeholder="Краткий заголовок" value="">
            </div>

            <label for="text" class="col-lg-1 control-label">Текст</label>
            <div class="col-lg-11">
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>

            <label for="image" class="col-lg-1 control-label">Картинка</label>
            <div class="col-lg-3">

                    <img height="100px" src="" alt="">

                <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <!-- Название элемента input определяет имя в массиве $_FILES -->

                <input class="form-control" type="file" id="image" accept="image/jpeg,image/png,image/gif" name="image" value="" alt="Картинка">
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