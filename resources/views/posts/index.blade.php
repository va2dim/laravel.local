@extends ('layouts.master')

@section ('content')


            <div class="col-sm-8 blog-main">
            @foreach($posts as $post)
               @include('posts.post')
            @endforeach

                <nav class="blog-pagination">
                    {{ $posts->appends($_REQUEST)->links() }} <!-- change blg.css .blog-pagination > .btn to .btn, +add margin-right: 0.25rem -->
                </nav>

            </div><!-- /.blog-main -->



@endsection