@extends ('layouts.master')

@section ('content')


            <div class="col-sm-8 blog-main">
            @foreach($posts as $post)
               @include('posts.post')
            @endforeach

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Старые</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Новые</a>
                </nav>

            </div><!-- /.blog-main -->



@endsection