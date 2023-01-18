<div id="fh5co-lucky-draw" class="fh5co-bg-top lazy" data-src="https://img.freepik.com/premium-photo/sakura-petals-falling-down-romantic-pink-flowers-falling-rain-flying-petals-pink-wide-background-love-romance-concept-neat-wedding-invitation_174187-6950.jpg?w=1308">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>2 lời chúc ấn tượng</h2>
            </div>
        </div>
        <div class="row">
            <div class="display-t">
                <div class="display-tc">
                    <div class="col-md-12">
                        @foreach ($luckydraw as $key => $item)
                        <div class="col-md-6 col-sm-6 text-center">
                            <div class="event-wrap animate-box">
                                <div class="testimony-slide active text-center">
                                    <h3>{{ $item->key }}</h3>
                                    <div>
                                        <strong class="lucky_draw_2_name">- {{ $item->name }} -</strong>
                                        <br>
                                        <i class="lucky_draw_2_email">[{{ $item->email }}]</i>
                                    </div>
                                    <br>
                                    <p class="lucky_draw_2_content">"{{ $item->content }}"</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>