<div class="container bg-white pt-5">
    @foreach ($poems as $poem)
    <div class="row blog-item px-3 pb-5">
        <div class="col-md-5">
            <img class="img-fluid mb-4 mb-md-0" src="images/gallery/{{ config('global.version') }}/webp/gallery-{{ $poem->id }}.webp" alt="Image">
        </div>
        <div class="col-md-7">
            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold"><a href="/tho/{{ $poem->slug }}">{{ $poem->title }}</a></h3>
            <div class="d-flex mb-3">
                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($poem->time)) }}</small>
            </div>
            <p>
                {!! $poem->content !!}
            </p>
            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    @endforeach

    <div class="row px-3 pb-5">
        <nav aria-label="Page navigation">
            <ul class="pagination m-0 mx-3">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>