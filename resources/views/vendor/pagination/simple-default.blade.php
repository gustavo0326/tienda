@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;atras</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"> &laquo;atras</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">siguiente&raquo;</a></li>
        @else
            <li class="disabled"><span>siguiente&raquo;</span></li>
        @endif
    </ul>
@endif
