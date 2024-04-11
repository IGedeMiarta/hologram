<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    a {
        font-family: "Inter", sans-serif;
        color: #343a40;
        line-height: 1;
    }

    .pagination,
    .page-numbers {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .pagination {
        margin-top: 128px;
    }

    .btn-nav,
    .btn-page {
        border-radius: 50%;
        background-color: #fff;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-nav {
        padding: 8px;
    }

    .btn-nav {
        width: 42px;
        height: 42px;
        border: 1.5px solid #111;
        color: #111;
    }

    .btn-nav:hover,
    .btn-page:hover {
        background-color: #111;
        color: #fff;
    }

    .btn-page {
        border: none;
        width: 36px;
        height: 36px;
        font-size: 16px;
    }

    .btn-selected {
        background-color: #111;
        color: #fff;
    }
</style>


@if ($paginator->hasPages())

    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a class="btn-nav left-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="left-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn-nav left-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="left-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        @endif
        <div class="page-numbers">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="dots">{{ $element }}</span>
                    {{-- <li class="disabled" aria-disabled="true"><span></span></li> --}}
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn-page btn-selected">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="btn-page">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn-nav right-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="right-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @else
            <a class="btn-nav right-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="right-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @endif
    </div>
    {{-- <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav> --}}
@endif
