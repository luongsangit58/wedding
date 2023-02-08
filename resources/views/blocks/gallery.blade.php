<?php 
    $arrGallery = range(1, config('global.count_gallery')); 
    shuffle($arrGallery);
    $arrGalleryShuffle = array_slice($arrGallery, 0, 6);
?>
@if(Route::current()->getName() == 'anh')
<div id="fh5co-gallery" class="fh5co-bg-bottom" data-scroll-top="anh">
@else
<div id="fh5co-gallery" class="fh5co-bg-bottom lazy" data-src="images/block/anh.webp" data-scroll-top="anh">
@endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <!-- <span>Our Memories</span> -->
                <h2><a href="/anh">Thư Viện Ảnh</a></h2>
                <p class="poem-love">
                    Ba chìm bảy nổi giữ trọn tấm lòng son</br>
                    Yêu nhau đến khi chỉ còn một hơi thở
                </p>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-gallery-list">
                    @if(Route::current()->getName() == 'anh')
                        @foreach ($arrGallery as $i)
                            <li class="one-third animate-box gallary-item lazy" data-src="images/gallery/webp/gallery-{{ $i }}.webp" data-animate-effect="fadeIn"> 
                                <a href="images/gallery/webp/gallery-{{ $i }}.webp" class="image-popup">
                                    <img data-src="images/gallery/webp/gallery-{{ $i }}.webp" class="item-gallery lazy"/>
                                </a>
                            </li>
                        @endforeach
                    @else
                        @foreach ($arrGalleryShuffle as $i)
                            <li class="one-third animate-box gallary-item lazy" data-src="images/gallery/webp/gallery-{{ $i }}.webp" data-animate-effect="fadeIn"> 
                                <a href="images/gallery/webp/gallery-{{ $i }}.webp" class="image-popup">
                                    <img data-src="images/gallery/webp/gallery-{{ $i }}.webp" class="item-gallery lazy"/>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>		
            </div>
        </div>
        @if(Route::current()->getName() != 'anh')
        <div class="btn-invitition text-center">
            <a href="/anh" class="btn btn-primary">Xem thêm</a>
        </div>
        @endif
    </div>
</div>