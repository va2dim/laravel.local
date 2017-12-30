@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

    <h1>Добавить автора</h1>



    <form action="/authors" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            @include('layouts.errors')

        <div class="form-group">
            <label for="__id" hidden class="col-lg-1 control-label">ID</label>
            <div class="col-lg-7">
                <input class="form-control" readonly hidden type="number" id="__id" name="__id" placeholder="ID цитаты" value="">
            </div>



            <label for="author" class="col-lg-1 control-label">Автор</label>
            <div class="col-lg-11">
                <div class="input-group">
                    <input class="form-control" type="text" id="author" name="author" placeholder="Добавить нового автора" value="">
                    <span class="input-group-btn">
                        <button id="addAuthor" class="btn btn-secondary" type="button">+</button>
                    </span>

                <select class="custom-select" id="author_old" name="author_old">
                    <option value="">Выберите автора</option>
                    @include('quotes.authors')
                </select>



                </div>
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

    <script type="text/javascript">

        $(document).ready(function() {
            $(".btn-secondary").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var author = $("input[name='author']").val();

                $.ajax({
                    url: "/authors",
                    type:'POST',
                    data: {_token:_token, author:author},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                        }else{
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

    </script>

@endsection
