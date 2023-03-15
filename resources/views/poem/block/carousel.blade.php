<?php 
    shuffle($poems);
    $arrPoems = array_slice($poems, 0, 3);
?>
<!-- Carousel Start -->
<div class="container p-0">
    <div id="blog-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($poems as $key => $poem)
            @if($key == 0)
            <div class="carousel-item active">
            @else
            <div class="carousel-item">
            @endif
                <img class="w-100" src="images/gallery/{{ config('global.version') }}/webp/gallery-32.webp" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h2 class="mb-3 text-white font-weight-bold">{{ $poem->title }}</h2>
                    <div class="d-flex text-white">
                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($poem->time)) }}</small>
                    </div>
                    <a href="/tho/{{ $poem->slug }}" class="btn btn-lg btn-outline-light mt-4">Xem thêm</a>
                </div>
            </div>
            @endforeach            
        </div>
        <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<!-- Carousel End -->