<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>О проекте</h4>
        <p>VYATA - <em>коллективный</em> блог практиков Ведической йоги и Традиционной Аюрведы. Приветствуется опыт каждого практикующего, который будет полезен сообществу.</p>
    </div>
    <div class="sidebar-module">
        <h4>Архивы</h4>
        <ol class="list-unstyled">
            @foreach($archives as $archive)
                <li><a href="/?month={{ $archive->month }}&year={{ $archive->year}}">{{ $archive->month.' '.$archive->year }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->