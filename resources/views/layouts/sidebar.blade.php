<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>
            <span class="oi oi-info" title="О проекте" aria-hidden="true" aria-label="О проекте"></span>
            О проекте
        </h4>
        <p>VYATA - <em>коллективный</em> блог практиков Ведической йоги и Традиционной Аюрведы. Приветствуется опыт каждого практикующего, который будет полезен сообществу.</p>
    </div>
    <div class="sidebar-module">
        <h4>
            <span class="oi oi-box" title="Архивы" aria-hidden="true" aria-label="Архивы"></span>
            Архивы
        </h4>
        <ol class="list-unstyled">
            @foreach($archives as $archive)
                <li><a href="/?month={{ $archive->month }}&year={{ $archive->year}}">{{ $archive->month.' '.$archive->year }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>
            <span class="oi oi-tags" title="Тэги" aria-hidden="true" aria-label="Тэги"></span>
            Тэги
        </h4>
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li><a href="/posts/tags/{{ $tag}}">{{ $tag }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>
            <span class="oi oi-share" title="Поделиться" aria-hidden="true" aria-label="Поделиться"></span>
            Поделиться
        </h4>
        <ol class="list-unstyled">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->