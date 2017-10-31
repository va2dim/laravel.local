@component('mail::message')

<h1>Добро пожаловать на коллективный блог-ресурс VYATA, {{  $user->name }}!</h1>

@component('mail::button', ['url' => 'vyata.org'])
Начать знакомство
@endcomponent

Спасибо что вы с нами,<br>
{{ config('app.name') }}
@endcomponent
