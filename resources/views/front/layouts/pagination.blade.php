@if ($paginator->hasPages())
    <div class="col-12 text-md-right text-center">
        <ul class="pagination modal-4">
            @if ($paginator->onFirstPage())

                <li class="disabled"><a class="prev">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Prev
                    </a>
                </li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev ">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Prev
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="showhide2"><a href="#" class="active">{{ $page }}</a></li>
                        @else
                            <li class="showhide2"><a href="{{ $url }}"
                                    class="">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())

                <li><a href="{{ $paginator->nextPageUrl() }}" class="next active"> Next
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a></li>
            @else
                <li class="disabled"><a class="next">
                        Next
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </li>


            @endif

        </ul>
    </div>
@endif
