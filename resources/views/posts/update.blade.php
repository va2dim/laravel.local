@extends('layouts.master')

@section('content')

    <h1>
        @if(!empty($post->id))
            Обновить
        @else
            Создать
        @endif
     пост</h1>

    <form action="/posts" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

        @include('layouts.errors')

        <!-- <legend>Cоздать пост</legend> -->
        <div class="form-group">
            <label for="id" class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="id" name="id" placeholder="ID поста" value="{{ $post->id }}">
            </div>

            <div class="col-lg-7">
                <input class="form-control" hidden readonly type="number" id="user_id" name="user_id" placeholder="ID пользователя" value="{{ Auth::User()->id }}">
            </div>

            <label for="date" class="col-lg-1 col-lg-offset-1 control-label">Дата</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="date" placeholder="Дата создания/изменения" value=
                @if($post->publicate_at)
                    "{{ $post->publicate_at }}">
                @else
                    "{{ date('Y-m-d') }}">
                @endif
            </div>

            <label for="title" class="col-lg-1 control-label">Заголовок</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="title" name="title" placeholder="Краткий заголовок" value="{{ $post->title }}">
            </div>

            <label for="body" class="col-lg-1 control-label">Текст</label>
            <div class="col-lg-11">
                <textarea rows="7" class="form-control" id="body" name="body" placeholder="Полный текст поста">{{ $post->body }}</textarea>
            </div>

            <label for="image" class="col-lg-1 control-label">Картинки</label>
            <div class="col-lg-11">



                <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                <!-- Название элемента input определяет имя в массиве $_FILES -->
                @if($post->images)
                    @foreach (unserialize($post->images) as $image)
                        <img src="{{ asset('images/'.$image) }}" height="100">
                    @endforeach
                @endif


                <input class="form-control" type="file" accept="image/jpeg,image/png,image/gif" id="images" name="images[]" value="" alt="Картинка">
                <input class="form-control" type="file" accept="image/jpeg,image/png,image/gif" id="images" name="images[]" value="" alt="Картинка">

            </div>


            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
                    <button type="reset" class="btn btn-default">Cбросить</button>
                    <button type="submit" class="btn btn-primary">
                        @if(!empty($post->id))
                            Обновить
                        @else
                            Создать
                        @endif
                    </button>
                </div>
            </div>

        </div>
        </fieldset>
    </form>

@endsection