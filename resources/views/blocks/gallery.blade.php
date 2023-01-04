<div id="fh5co-gallery" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <!-- <span>Our Memories</span> -->
                <h2><a href="anh">Thư Viện Ảnh</a></h2>
                <p class="poem-love">
                    Ba chìm, bảy nổi giữ trọn tấm lòng son</br>
                    Yêu nhau đến khi chỉ còn một hơi thở
                </p>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-12">
                <ul id="fh5co-gallery-list">
                    @if(Route::current()->getName() == 'anh')
                        @for ($i = 1; $i <= 12; $i++)
                            <li class="one-third animate-box lazy" data-src="images/gallery-{{ $i }}.jpg" data-animate-effect="fadeIn"> 
                                <a href="images/gallery-{{ $i }}.jpg" class="image-popup">
                                    <img data-src="images/gallery-{{ $i }}.jpg" class="item-gallery lazy"/>
                                </a>
                            </li>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 6; $i++)
                            <li class="one-third animate-box lazy" data-src="images/gallery-{{ $i }}.jpg" data-animate-effect="fadeIn"> 
                                <a href="images/gallery-{{ $i }}.jpg" class="image-popup">
                                    <img data-src="images/gallery-{{ $i }}.jpg" class="item-gallery lazy"/>
                                </a>
                            </li>
                        @endfor
                    @endif
                </ul>		
            </div>
        </div>
    </div>
</div>