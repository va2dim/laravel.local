@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><span class="btn btn-outline-secondary disabled">@lang('pagination.previous')</span></li>
        @else
            <li><a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="btn btn-outline-primary round"  href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li><span class="btn btn-outline-secondary disabled">@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
