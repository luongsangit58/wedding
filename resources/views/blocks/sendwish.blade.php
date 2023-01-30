<?php if (time() < config('global.stop_send_wish')) : ?>
    <div class="fh5co-section bg-send-wish lazy" data-scroll-top='gui-loi-chuc' data-src="https://img.freepik.com/premium-photo/sakura-petals-falling-down-romantic-pink-flowers-falling-rain-flying-petals-pink-wide-background-love-romance-concept-neat-wedding-invitation_174187-6950.jpg?w=1308">
    <div class="container">
        <div class="row">
            <div class="col-md-12 embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://youtube.com/embed/gHqEV7Amai8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!-- <video width="100%" height="100%" poster="images/poster-wish.jpg" controls>
                <source src="videos/wish.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video> -->
            <br/>
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Gửi lời chúc</h2>
                <p class="poem-love">Khi gửi lời chúc bạn sẽ có cơ hội trở thành 2 người may mắn dành được phần quà vô cùng ý nghĩa từ Sang Trang trong ngày trọng đại!</p>
            </div>
            <div class="col-md-6 col-md-offset-3 animate-box box-sent-wish">
                <form>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <h3 class="send-wish-box-title">Tên của bạn</h3>
                            <input type="text" id="fname" class="form-control" placeholder="Tên của bạn">
                        </div>
                    </div>
                    <br/>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <h3 class="send-wish-box-title">Email của bạn</h3>
                            <input type="email" id="email" class="form-control" placeholder="Email sẽ được bảo mật tuyệt đối">
                        </div>
                    </div>
                    <br/>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <h3 class="send-wish-box-title">Lời chúc</h3>
                            <textarea name="message" id="message" cols="30" rows="6" class="form-control" placeholder="Hãy gửi đến Sang Trang những lời chúc thân thương nhất! (Vui lòng không gửi Emoji)"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="button" value="Gửi" class="btn btn-primary btn-send-wish">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
