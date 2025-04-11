@if ($paginator->hasPages())
<nav class="pagination justify-content-center"  aria-label="pagination">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        @else
            <li class="pagination-item pagination-item--previous">
                <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pagination-item disabled" aria-disabled="true"><span class="pagination-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item pagination-item--current" aria-current="page">
                            <a class="pagination-link" aria-label="Page {{ $page }} of {{ $paginator->lastPage() }}">{{ $page }}</a>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a class="pagination-link" href="{{ $url }}" aria-label="Page {{ $page }} of {{ $paginator->lastPage() }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item pagination-item--next">
                <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>
@endif