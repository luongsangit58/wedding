<div id="fh5co-testimonial" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <!-- <span>Best Wishes</span> -->
                    <h2><a href="gui-loi-chuc">Lời Chúc</a></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="wrap-testimony">
                        <div class="owl-carousel-fullwidth">
                            @foreach ($wishes as $wish)
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <blockquote>
                                        <p>"{{ $wish->content }}"</p>
                                    </blockquote>
                                    <span>- {{ $wish->name }} -</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-invitition text-center">
            <a href="gui-loi-chuc" class="btn btn-primary">Gửi lời chúc</a>
        </div>
    </div>
</div>