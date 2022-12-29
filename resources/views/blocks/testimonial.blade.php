<div id="fh5co-testimonial">
    <div class="container">
        <div class="row">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <!-- <span>Best Wishes</span> -->
                    <h2>Lời Chúc</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="wrap-testimony">
                        <div class="owl-carousel-fullwidth">
                            @foreach ($invitations as $invitation)
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <blockquote>
                                        <p>"{{ $invitation->invitation }}"</p>
                                    </blockquote>
                                    <span>- {{ $invitation->name }} -</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>