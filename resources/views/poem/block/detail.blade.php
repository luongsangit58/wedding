<!-- Blog Detail Start -->
<div class="container py-5 px-2 bg-white">
    <div class="row px-4">
        <div class="col-12">
            <img class="img-fluid mb-4" src="/images/gallery/{{ config('global.version') }}/webp/gallery-{{ $data['poem']->id }}.webp" alt="Image">
            <h2 class="mb-3 font-weight-bold">{{ $data['poem']->title }}</h2>
            <div class="d-flex">
                <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($data['poem']->time)) }}</p>
            </div>
            <p>{!! $data['poem']->content !!}</p>
        </div>

        <div class="col-12 py-4">
            <div class="btn-group btn-group-lg w-100">
                <button type="button" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i> Previous</button>
                <button type="button" class="btn btn-outline-primary">Next<i class="fa fa-angle-right ml-2"></i></button>
            </div> 
        </div>
    </div>
</div>
<!-- Blog Detail End -->