@if ($paginator->hasPages())
    <ul class="list-inline list-unstyled">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
            </li>
        @else
            <li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
            </li>
        @endif
        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a href="{{ $url.'&limit='.$limit.'&sort='.$sort  }}">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url.'&limit='.$limit.'&sort='.$sort }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
            </li>
        @endif
    </ul>
@endif
