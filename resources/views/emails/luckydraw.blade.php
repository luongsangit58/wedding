<!DOCTYPE html>
<html lang="vi">
<head>
    <title>SangTrang.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Dear {{ $mailData['name'] }},</p>
                <p>Xin chúc mừng bạn đã trở thành 1 trong 2 người may mắn nhận được phần quà từ vợ chồng Sang Trang.</p>
                <div>
                    <p>Mã số may mắn của bạn là: <strong style="font-size: 25px;">{{ $mailData['key'] }}</strong></p>
                </div>
                <p>Trong trường hợp bạn không thể đến dự lễ thành hôn của Sang Trang để nhận quà trực tiếp. Sang Trang sẽ chủ động liên hệ lại bạn sau.</p>
                <p>Trân trọng cảm ơn!</p>
                <br>
                <div class="contact">
                    <p>Thông tin liên hệ:</p>
                    <small class="block">Nguyễn Lương Sang</small>
                    <br>
                    <small class="block">Điện thoại: <a href="tel://0961191464" aria-label="Tel">0961.191.464</a></small>
                    <br>
                    <small class="block">Email: <a href="mailto:luongsangit58@gmail.com" aria-label="Email">luongsangit58@gmail.com</a></small>
                    <br>
                    <small class="block">Website: <a href="https://sangtrang.com" target="_blank" aria-label="Website">https://sangtrang.com</a></small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>