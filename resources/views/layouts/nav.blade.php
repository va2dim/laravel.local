
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link" href="/"><span class="oi oi-menu" title="Меню" aria-hidden="true" aria-label="Меню"></span></a>
                <a class="nav-link active" href="/">Посты</a>
                <a class="nav-link" href="/posts/create">
                    <span class="oi oi-plus" title="Добавить пост" aria-hidden="true" aria-label="Добавить пост"></span>
                </a>
                <a class="nav-link" href="#">Блоги</a>
                <a class="nav-link" href="/hubs">Хабы</a>
                <a class="nav-link" href="/hubs/create">
                    <span class="oi oi-plus" title="Добавить хаб" aria-hidden="true" aria-label="Добавить хаб"></span>
                </a>
                <a class="nav-link" href="/quotes">Цитаты</a>
                <a class="nav-link" href="/quotes/create">
                    <span class="oi oi-plus" title="Добавить цитату" aria-hidden="true" aria-label="Добавить цитату"></span>
                </a>
                <a class="nav-link" href="/about">О проекте</a>

                @if (Auth::check())
                    <a class="nav-link ml-auto" href="">{{ Auth::User()->name }}</a><a class="nav-link" href="/logout">
                        Выйти <span class="oi oi-account-logout" title="Выйти" aria-hidden="true" aria-label="Выйти"></span>
                    </a>
                @else
                    <a class="nav-link ml-auto" href="/login">
                        Войти <span class="oi oi-account-login" title="Войти" aria-hidden="true" aria-label="Войти"></span></a><a class="nav-link" href="/register">Зарегистрируйтесь</a>
                @endif
            </nav>
        </div>
    </div>
