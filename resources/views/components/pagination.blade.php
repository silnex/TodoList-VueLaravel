<div>
        <ul class="pagination m-0">
            <li class="page-item"><a class="page-link" href="{{ $paginate->previousPageUrl() }}">Previous</a></li>
            @for ($i = 1; $i < $paginate->perPage(); $i++)
            <li class="page-item {{ ($paginate->currentPage() === $i) ? 'active' : '' }}"><a
                    class="page-link" href="{{ $paginate->url($i) }}">{{ $i }}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="{{ $paginate->nextPageUrl() }}">Next</a></li>
        </ul>
    </div>
