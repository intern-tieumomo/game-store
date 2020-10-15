@if ($paginator->hasPages())
    <div class="row">
        <div class="col-12">
            <div class="blog-pagination text-center">
                <ul class="page-pagination">
                    @if ($paginator->onFirstPage())
                        <li>
                            <span><i class="icofont-long-arrow-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}">
                                <span><i class="icofont-long-arrow-left"></i></span>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><span>{{ $page }}</span></li>
                                @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @elseif ($page == $paginator->lastPage() - 1)
                                    <li><span><i class="fa fa-ellipsis-h"></i></span></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}">
                                <span><i class="icofont-long-arrow-right"></i></span>
                            </a>
                        </li>
                    @else
                        <li>
                            <span><i class="icofont-long-arrow-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
