
    <hr>
    <div class="card">
        <div class="card-block">
            <form action="/posts/{{ $post->id }}/comments" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
                <fieldset>

                    <div class="form-group">
                        <div class="col-lg-7">
                            <input class="form-control" hidden readonly type="number" id="user_id" name="user_id" placeholder="ID пользователя" value="{{ Auth::User()->id }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            @include('layouts.errors')
                            <textarea class="form-control" id="body" name="body" placeholder="{{ Auth::User()->name }}, вы можете оставить свой комментарий к этому посту"></textarea>
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

