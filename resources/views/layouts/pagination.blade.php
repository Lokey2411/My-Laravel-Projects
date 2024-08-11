@if ($paginator->lastPage() > 1)
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a href="#" disabled>&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="active-page">&laquo;</a>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <a href="">{{ $element }}</a>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($paginator->currentPage() == $page)
                        <a href="{{ $url }}" class="active-page">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @else
            <a disabled>&raquo;</a>
        @endif
    </div>
@endif
