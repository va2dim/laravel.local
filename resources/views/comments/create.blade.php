
    <hr>
    <div class="card">
        <div class="card-block">
            <form action="/posts/{{ $post->slug }}/comments" method="post" enctype="multipart/form-data">

            {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
                <fieldset>

                    <div class="form-group">
                        <div class="col-lg-7">
                            <a name="respond" href="" onclick="selectCommmentedComment(null, '{{ Auth::User()->name }}, вы можете оставить свой комментарий к этому посту')">Нажмите</a>, чтобы комментировать сам пост
                            <input class="form-control" hidden readonly type="number" id="user_id" name="user_id" placeholder="ID пользователя" value="{{ Auth::User()->id }}">
                            <input class="form-control" hidden readonly type="number" id="parent_id" name="parent_id" placeholder="Родительский ID комментария">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            @include('layouts.errors')
                            <textarea rows=3 class="form-control" id="body" name="body" placeholder="{{ Auth::User()->name }}, вы можете оставить свой комментарий к этому посту"></textarea>
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


    <script type="text/javascript">

        function selectCommmentedComment(parent_id, comment_body) {
            document.getElementById("parent_id").value = parent_id;
            document.getElementById("body").placeholder = comment_body;
        }

    </script>