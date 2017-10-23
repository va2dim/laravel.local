@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <h1>Войти</h1>

        <form action="/login" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
            <fieldset>

            @include('layouts.errors')

            <!-- <legend>Войти</legend> -->
                <div class="form-group">
                    <label for="email" class="col-lg-1 control-label">Email:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" value="" required>
                    </div>

                    <label for="password" class="col-lg-1 control-label">Пароль:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Пароль" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-11 col-lg-offset-1">
                        <button type="reset" class="btn btn-default">Cбросить</button>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

@endsection