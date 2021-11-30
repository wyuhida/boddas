
@if ($paginator->hasPages())
<nav aria-label="Page navigation example" class="col-md-12 mb20">
    <ul class="pagination justify-content-center">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link">←</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active my-active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">→</a></li>
        @else
            <li class="page-item disabled"><a class="page-link">→</a></li>
        @endif
    </ul>
</nav>
@endif 