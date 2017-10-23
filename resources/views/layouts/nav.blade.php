
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link active" href="/">Home</a>
                <a class="nav-link" href="/posts/create">Создать пост</a>
                <a class="nav-link" href="#">Press</a>
                <a class="nav-link" href="#">New hires</a>
                <a class="nav-link" href="#">About</a>

                @if (Auth::check())
                    <a class="nav-link ml-auto" href="">{{ Auth::User()->name }}</a><a class="nav-link" href="/logout">Выйти</a>
                @else
                    <a class="nav-link ml-auto" href="/login">Войти</a><a class="nav-link" href="/register">Зарегестрируйтесь</a>
                @endif
            </nav>
        </div>
    </div>
