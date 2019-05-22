
@if ($paginator->hasPages())
        <div style="text-align: center">

        @if ($paginator->onFirstPage())

            <span style="font-size: 25px;color: #515966;cursor: default">&#9668;</span>

        @else

            <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" >&#9668;</a>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))

               <span style="font-size: 25px;color: #515966;cursor: default">{{ $element }}</span>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                       <span style="font-size: 25px;color: #515966;cursor: default">{{ $page }}</span>

                    @else

                        <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())

            <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&#9658;</a>

        @else

            <span style="font-size: 25px;color: #515966;cursor: default">&#9658;</span>

        @endif


</div>
@endif

