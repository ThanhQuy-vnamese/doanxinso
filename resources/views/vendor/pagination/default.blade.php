
            @if ($paginator->hasPages())
                <ul class="phantrang">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled" id="it"><span class="link">&laquo;</span></li>
                    @else
                        <li id="it"><a href="{{ $paginator->previousPageUrl() }}" class="link" rel="prev">&laquo;</a></li>
                    @endif
            
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled" id="it"><span class="link">{{ $element }}</span></li>
                        @endif
            
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active" id="it"><span class="link">{{ $page }}</span></li>
                                @else
                                    <li id="it"><a href="{{ $url }}" class="link">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
            
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li id="it"><a href="{{ $paginator->nextPageUrl() }}" class="link" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled" id="it"><span class="link">&raquo;</span></li>
                    @endif
                </ul>
            @endif

