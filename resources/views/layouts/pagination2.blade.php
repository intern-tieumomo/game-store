@if ($paginator->hasPages())
    <div class="pagination flex-m flex-w p-t-26">
        @if ($paginator->onFirstPage())
            <a href="javascript:void(0)" class="item-pagination flex-c-m trans-0-4">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
            </a>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="item-pagination flex-c-m trans-0-4">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void(0)" class="item-pagination flex-c-m trans-0-4 active-pagination">{{ $page }}</a>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <a href="{{ $url }}" class="item-pagination flex-c-m trans-0-4">{{ $page }}</a>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <a href="javascript:void(0)" class="item-pagination flex-c-m trans-0-4">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="next-page">
                <a rel="next" href="{{ $paginator->nextPageUrl() }}" class="item-pagination flex-c-m trans-0-4">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
            </li>
        @else
            <li>
                <a href="javascript:void(0)" class="item-pagination flex-c-m trans-0-4">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
            </li>
        @endif
    </div>
@endif
