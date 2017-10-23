
@section('content')

    <div class="col-sm-8 blog-main">

    <h1>Cоздать комментарий</h1>

    <form action="/post/{post_id}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

        @include('layouts.errors')

        <!-- <legend>Cоздать комментарий</legend> -->
        <div class="form-group">
            <label for="__id" class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly type="number" id="__id" name="__id" placeholder="ID коммента" value="">
            </div>

            <label for="date" class="col-lg-1 col-lg-offset-1 control-label">Дата</label>
            <div class="col-lg-2">
                <input class="form-control" type="date" id="date" name="date" placeholder="Дата создания/изменения" value="">
            </div>


            <label for="text" class="col-lg-1 control-label">Текст</label>
            <div class="col-lg-11">
                <textarea class="form-control" id="body" name="body"></textarea>
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