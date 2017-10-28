
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link active" href="/">Домой</a>
                <a class="nav-link" href="/posts/create">+</a>
                <a class="nav-link" href="#">Блоги</a>
                <a class="nav-link" href="/hubs">Хабы</a>
                <a class="nav-link" href="/hubs/create">+</a>
                <a class="nav-link" href="/quotes">Цитаты</a>
                <a class="nav-link" href="/quotes/create">+</a>
                <a class="nav-link" href="/about">О проекте</a>

                @if (Auth::check())
                    <a class="nav-link ml-auto" href="">{{ Auth::User()->name }}</a><a class="nav-link" href="/logout">Выйти</a>
                @else
                    <a class="nav-link ml-auto" href="/login">Войти</a><a class="nav-link" href="/register">Зарегестрируйтесь</a>
                @endif
            </nav>
        </div>
    </div>
