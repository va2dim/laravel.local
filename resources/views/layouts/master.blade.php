<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>VYATA - Serve, love & give</title>

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
</head>

<body>



@include('layouts.nav')

<header>
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">VYATA</h1>
            <p class="lead blog-description" style="text-align: right">Коллективный блог практиков Ведической йоги и Традиционной Аюрведы.<br> Жемчужины вдохновляющих мыслей и практические реализации интересных людей.</p>
        </div>
    </div>
</header>

@if($flash = session('msg')) <!-- Flash message after successful registration of user -->
    <div class="alert alert-success" id="flash-msg" role="alert">
        {{ $flash }}
    </div>
@endif


<div class="container">

    <div class="row">
        @yield('content')
        @include('layouts.sidebar')
    </div>
</div>


@include('layouts.footer')



<!--//
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
-->
</body>
</html>