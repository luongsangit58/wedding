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
                <p>{{ $mailData['name'] }} đã gửi lời chúc đến https://sangtrang.com,</p>
                <blockquote class="blockquote">
                    <p class="mb-0">"{{ $mailData['content'] }}"</p>
                </blockquote>
                <p>Email: {{ $mailData['email'] }}</p>
                <p>Thời gian gửi: {{ $mailData['time'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>