<!-- Modal showWish -->
<div class="modal fade" id="showWish" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Sang Trang đã nhận được lời chúc của bạn!</h4>
            </div>
            <div class="owl-item modal-body">
                <div class="item">
                    <div class="testimony-slide active text-center">
                        <p class="content-wish">"Chúc mừng hạnh phúc 2 em. Vợ chồng đầu bạc răng long em nhé!"</p>
                        <strong><p class="sender-name">- Đặng Lê Nguyên Vũ -</p></strong>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer" <?php if (time() > config('global.stop_send_wish')) echo "style='display:none;'"; ?>>
                <p class="text-center" style="color: #000;">Thư cảm ơn sẽ được gửi đến<br/>email <span class="sender-email">danglenguyenvu@gmail.com</span> trong thời gian sớm nhất!</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal errorWish -->
<div class="modal fade" id="errorWish" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Khoan. Dừng khoảng chừng là 2 giây!</h4>
            </div>
            <div class="owl-item modal-body">
                <div class="item">
                    <div class="testimony-slide active text-center">
                        <span>
                            <p class="content-wish">Đã có lỗi xảy ra :(</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>