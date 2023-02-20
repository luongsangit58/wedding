<div id="fh5co-testimonial" class="fh5co-bg-top lazy" data-src="/images/block/listwishes.webp">
    <div class="container">
        <div class="row">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2><a href="/loi-chuc" aria-label="Lời chúc">Lời Chúc</a></h2>
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
                                    <i>[{{ $wish->email }}]</i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-invitition text-center">
            <a href="/gui-loi-chuc" class="btn btn-primary" aria-label="Gửi lời chúc">Gửi lời chúc</a>
        </div>
    </div>
</div>