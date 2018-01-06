@extends('layouts.master')

@section('content')

    <h1>
        @if(!empty($quote->id))
            Обновить
        @else
            Добавить
        @endif
            цитату
    </h1>

    <div class="alert alert-danger print-error-msg" style="display:none"></div>

    <form action="/quotes" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

        @include('layouts.errors')

        <!-- <legend>Cоздать пост</legend> -->
        <div class="form-group">
            <label for="__id" class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="id" name="id" placeholder="ID цитаты" value="{{ $quote->id }}">
            </div>
<!--
            <label for="user_id" class="col-lg-1 control-label">ID пользователя</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="user_id" name="user_id" placeholder="ID пользователя" value="auth()->user->id">
            </div>
-->
            <label for="date" class="col-lg-4 col-lg-offset-1 control-label">Дата публикации</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="publicate_at" placeholder="Дата публикации"
                       value=
                        @if($quote->publicate_at)
                            "{{ $quote->publicate_at }}">
                        @else
                            "{{ date('Y-m-d') }}">
                        @endif
            </div>

            <label for="category" class="col-lg-11 control-label">Жанр/категория</label>
            <div class="col-lg-11">
                <div class="input-group">
                    <select class="custom-select" id="category" name="category">
                        <option value="">Выберите категорию</option>
                        @include('quotes.categories')
                    </select>

                    <input class="form-control" type="text" id="category_new" name="category_new" placeholder="Добавить новую категорию" value="">
                    <span class="input-group-btn">
                        <button id="category" class="btn btn-secondary" type="button">+</button>
                    </span>
                </div>
            </div>

            <label for="title" class="col-lg-1 control-label">Заголовок</label>
            <div class="col-lg-11">
                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок" value="{{ $quote->title }}">
            </div>

            <label for="body" class="col-lg-1 control-label">Текст</label>
            <div class="col-lg-11">
                <textarea rows="7" class="form-control" id="body" name="body">{{ $quote->body }}</textarea>
            </div>

            <label for="author" class="col-lg-1 control-label">Автор</label>
            <div class="col-lg-11">
                <div class="input-group">
                    <select class="custom-select" id="author" name="author">
                        <option value="">Выберите автора</option>
                        @include('quotes.authors')
                    </select>

                    <input class="form-control" type="text" id="author_new" name="author_new" placeholder="Добавить нового автора" value="">
                    <span class="input-group-btn">
                        <button id="author" class="btn btn-secondary" type="button">+</button>
                    </span>

                </div>
            </div>

            <label for="source" class="col-lg-1 control-label">Источник</label>
            <div class="col-lg-11">
                <div class="input-group">
                    <select class="custom-select" id="source" name="source">
                        <option value="">Выберите источник</option>
                        @include('quotes.sources')
                    </select>

                    <input class="form-control" type="text" id="source_new" name="source_new" placeholder="Добавить новый источник" value="">
                    <span class="input-group-btn">
                        <button id="source" class="btn btn-secondary" type="button">+</button>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
                    <button type="reset" class="btn btn-default">Cбросить</button>
                    <button type="submit" class="btn btn-primary">
                        @if(!empty($quote->id))
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



    <script type="text/javascript">
/*
        $(document).ready(function() {
            $(".btn-secondary").click(function(e){
                var item_name = this.id;

                e.preventDefault();

                var _token = $("input[name='_token']").val();

                var item_value = $("input[name='" + item_name + "_new" + "']").val();
                var data = {_token:_token}
                data[item_name] = item_value;

                if(item_name == "category") url = "/categories";
                else url = "/" + item_name + "s";
                //window.alert(item_name + data[item_name] + url);

                $.ajax({
                    //url: "/authors", - OK "/sources,categories" - not work
                    url: url,
                    type:'POST',
                    data: data,
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

            });

            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });

            }


        });
*/
    </script>

@endsection
