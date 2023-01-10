<div id="fh5co-testimonial" class="fh5co-bg-top lazy" data-src="https://img.freepik.com/free-photo/vintage-japanese-floral-frame-peach-blossoms-hibiscus-art-print_53876-121688.jpg?w=1380&t=st=1673078906~exp=1673079506~hmac=88a0a4656275a90840fa086d9f8a7e25863b7a2ae88e91ac7c99d0b125825fc4">
    <div class="container">
        <div class="row">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2><a href="/loi-chuc">Lời Chúc</a></h2>
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
            <a href="/gui-loi-chuc" class="btn btn-primary">Gửi lời chúc</a>
        </div>
    </div>
</div>