<?php 
    $arrGallery = range(1, config('global.count_gallery')); 
    shuffle($arrGallery);
    $arrGalleryShuffle = array_slice($arrGallery, 0, 6);
?>
<div id="fh5co-gallery" class="fh5co-bg-bottom lazy" data-src="https://img.freepik.com/free-photo/blank-elegant-floral-frame-design_53876-128149.jpg?w=1380" data-scroll-top="anh">
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
                            <li class="one-third animate-box lazy" data-src="images/gallery/gallery-{{ $i }}.jpg" data-animate-effect="fadeIn"> 
                                <a href="images/gallery/gallery-{{ $i }}.jpg" class="image-popup">
                                    <img data-src="images/gallery/gallery-{{ $i }}.jpg" class="item-gallery lazy"/>
                                </a>
                            </li>
                        @endforeach
                    @else
                        @foreach ($arrGalleryShuffle as $i)
                            <li class="one-third animate-box lazy" data-src="images/gallery/gallery-{{ $i }}.jpg" data-animate-effect="fadeIn"> 
                                <a href="images/gallery/gallery-{{ $i }}.jpg" class="image-popup">
                                    <img data-src="images/gallery/gallery-{{ $i }}.jpg" class="item-gallery lazy"/>
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