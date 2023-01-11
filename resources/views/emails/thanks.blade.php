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
                <p>Vào ngày cưới vô cùng trọng đại, Sang Trang sẽ gửi đến 2 bạn may mắn nhất trong danh những bạn đã gửi lời chúc dựa theo Mã số may mắn gửi qua email bằng hình thức quay mã số.</p>
                <div class="text-center">
                    <p>Mã số may mắn của bạn là:
                        <strong>{{ $mailData['key'] }}</strong>
                    </p>
                </div>
                <p>Hãy đến dự lễ thành hôn của Sang Trang để cùng chung vui và có cơ hội nhận những phần quà thật hấp dẫn nhé!</p>
                <p>Trân trọng cảm ơn!</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>