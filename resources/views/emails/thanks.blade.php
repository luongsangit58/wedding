<!DOCTYPE html>
<html>
<head>
    <title>SangTrang.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Dear {{ $mailData['name'] }},</p>
                <p>Sang Trang xin chân thành cảm ơn lời chúc vô cùng ý nghĩa của bạn.</p>
                <blockquote class="blockquote">
                    <p class="mb-0">"{{ $mailData['content'] }}"</p>
                  </blockquote>
                <p>Sang Trang sẽ trao đến 2 người may mắn nhất trong danh những bạn đã gửi lời chúc dựa theo <strong>Mã số may mắn</strong> bằng hình thức quay ngẫu nhiên vào ngày tổ chức hôn lễ 25/02/2023 (Ngày 6 tháng 2 năm Quý Mão).</p>
                <div class="text-center">
                    <p>Mã số may mắn của bạn là: <strong>{{ $mailData['key'] }}</strong></p>
                </div>
                <p>Hãy đến dự lễ thành hôn của Sang Trang để cùng chung vui và có cơ hội nhận những phần quà thật hấp dẫn nhé!</p>
                <p>Trân trọng cảm ơn!</p>
                <br>
                <div class="contact">
                    <p>Thông tin liên hệ:</p>
                    <small class="block">Nguyễn Lương Sang</small>
                    <br>
                    <small class="block">Điện thoại: <a href="tel://0961191464">0961.191.464</a></small>
                    <br>
                    <small class="block">Email: <a href="mailto:luongsangit58@gmail.com">luongsangit58@gmail.com</a></small>
                    <br>
                    <small class="block">Website: <a href="https://sangtrang.com" target="_blank">https://sangtrang.com</a></small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>