<?php 
    $arrGallery = range(1, 195); 
    shuffle($arrGallery);
    $arrGalleryShuffle = array_slice(range(1, 195), 0, 6);
?>

<div id="fh5co-gallery-a;bum" class="fh5co-bg-bottom" data-scroll-top="album">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <!-- <span>Our Memories</span> -->
                <h2><a href="/album">Album</a></h2>
                <p class="poem-love">
                    Ba chìm bảy nổi giữ trọn tấm lòng son</br>
                    Yêu nhau đến khi chỉ còn một hơi thở
                </p>
            </div>
            <div class="col-md-12 embed-responsive embed-responsive-16by9" style="margin-bottom: 35px;">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ilfkFK8CQyI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-gallery-list">
                    @if(Route::current()->getName() == 'album')
                        @foreach ($arrGallery as $i)
                            <li class="one-third animate-box gallary-item lazy" data-src="images/album/{{ config('global.version') }}/{{ $i }}.webp" data-animate-effect="fadeIn"> 
                                <a href="images/album/{{ config('global.version') }}/{{ $i }}.webp" class="image-popup" aria-label="Gallery">
                                    <img data-src="images/album/{{ config('global.version') }}/{{ $i }}.webp" class="item-gallery lazy" alt="gallery"/>
                                </a>
                            </li>
                        @endforeach
                    @else
                        @foreach ($arrGalleryShuffle as $i)
                            <li class="one-third animate-box gallary-item lazy" data-src="images/album/{{ config('global.version') }}/{{ $i }}.webp" data-animate-effect="fadeIn"> 
                                <a href="images/album/{{ config('global.version') }}/{{ $i }}.webp" class="image-popup" aria-label="Gallery">
                                    <img data-src="images/album/{{ config('global.version') }}/{{ $i }}.webp" class="item-gallery lazy" alt="gallery"/>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>		
            </div>
        </div>
        @if(Route::current()->getName() != 'album')
        <div class="btn-invitition text-center" style="margin-bottom: 35px;">
            <a href="/album" class="btn btn-primary" aria-label="Xem thêm">Xem thêm</a>
        </div>
        @endif
    </div>
</div>