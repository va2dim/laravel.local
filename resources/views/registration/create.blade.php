@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <h1>Зарегистрироваться</h1>

        <form action="/register" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
            <fieldset>

            @include('layouts.errors')

            <!-- <legend>Cоздать пост</legend> -->
                <div class="form-group">
<!--
                    <label for="__id" class="col-lg-1 control-label">ID</label>
                    <div class="col-lg-7">
                        <input class="form-control" readonly type="number" id="__id" name="__id" placeholder="ID пользователя" value="">

                    </div>

                    <label for="date" class="col-lg-1 col-lg-offset-1 control-label">Дата</label>
                    <div class="col-lg-2">
                        <input class="form-control" readonly type="date" id="date" name="date" placeholder="Дата создания/изменения" value="">
                    </div>
-->
                    <label for="name" class="col-lg-1 control-label">Имя:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Имя пользователя" value="" required>
                    </div>

                    <label for="email" class="col-lg-1 control-label">Email:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" value="" required>
                    </div>

                    <label for="password" class="col-lg-1 control-label">Пароль:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Пароль (не меньше 3 символов)" value="" required>
                    </div>

                    <label for="password_confirmation" class="col-lg-5 control-label">Подтверждение пароля:</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Подтвердите" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-11 col-lg-offset-1">
                        <button type="reset" class="btn btn-default">Cбросить</button>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

@endsection