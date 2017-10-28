@extends ('layouts.master')

@section ('content')


            <div class="col-sm-8 blog-main">
            @foreach($quotes->chunk(2) as $quotes_chunk)
                    <div class="container">
                    <div class="row">
                    @foreach($quotes_chunk as $quote)
                            <div class="col-sm-6">
                        @include('quotes.post')
                            </div>
                    @endforeach
                    </div>
                    </div>

            @endforeach

                <nav class="blog-pagination">
                    {{ $quotes->links('vendor\pagination\simple-bootstrap-4') }} <!-- or use simple-default - $quotes->links() 4 round btn -->
                </nav>
            </div>
            <!-- /.blog-main -->



@endsection