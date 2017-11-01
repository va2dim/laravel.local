<!doctype html>
<html lang="en">
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
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>



@include('layouts.nav')

<header>
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">VYATA</h1>
            <p class="lead blog-description">Коллективный блог практиков Ведической йоги и Традиционной Аюрведы. Жемчужины мыслей и практические реализации интересных людей</p>
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



</body>
</html>