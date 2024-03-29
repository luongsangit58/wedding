<!DOCTYPE html>

<html lang="vi" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- anh -->
		@if(Route::current()->getName() == 'anh')
		<title>Thư viện ảnh - Sang Trang</title>
        <meta name="description" content="Thư viện ảnh - Sang Trang" />

		<meta property="og:title" content="Thư viện ảnh - Sang Trang"/>
		<meta name="twitter:title" content="Thư viện ảnh - Sang Trang" />

		<!-- gui-loi-chuc -->
		@elseif(Route::current()->getName() == 'gui-loi-chuc')
		<title>Gửi lời chúc - Sang Trang</title>
        <meta name="description" content="Gửi lời chúc - Sang Trang" />

		<meta property="og:title" content="Gửi lời chúc - Sang Trang"/>
		<meta name="twitter:title" content="Gửi lời chúc - Sang Trang" />

		<!-- chuyen-tinh -->
		@elseif(Route::current()->getName() == 'chuyen-tinh')
		<title>Chuyện tình - Sang Trang</title>
        <meta name="description" content="Chuyện tình - Sang Trang" />
		
		<meta property="og:title" content="Chuyện tình - Sang Trang"/>
		<meta name="twitter:title" content="Chuyện tình - Sang Trang" />	
		
		<!-- thiep-moi -->
		@elseif(Route::current()->getName() == 'thiep-moi')
		<title>Thiệp mời {{ $invitation->name }} - Sang Trang</title>
        <meta name="description" content="Thiệp mời {{ $invitation->name }} - Sang Trang" />

		<meta property="og:title" content="Thiệp mời {{ $invitation->name }} - Sang Trang"/>
		<meta name="twitter:title" content="Thiệp mời {{ $invitation->name }} - Sang Trang" />

		<!-- loi-chuc -->
		@elseif(Route::current()->getName() == 'loi-chuc')
		<title>Lời chúc - Sang Trang</title>
        <meta name="description" content="Lời chúc - Sang Trang" />

		<meta property="og:title" content="Lời chúc - Sang Trang"/>
		<meta name="twitter:title" content="Lời chúc - Sang Trang" />

		<!-- album -->
		@elseif(Route::current()->getName() == 'album')
		<title>Album - Sang Trang</title>
        <meta name="description" content="Album - Sang Trang" />

		<meta property="og:title" content="Album - Sang Trang"/>
		<meta name="twitter:title" content="Album - Sang Trang" />

		<!-- home -->
		@else
		<title>Sang Trang</title>
		<meta name="description" content="Sang Trang" />
		
		<meta property="og:title" content="Sang Trang"/>
		<meta name="twitter:title" content="Sang Trang" />
        @endif

		<meta name="keywords" content="sangtrang.com, sang trang, sangtrang, đám cưới, dam cuoi, wedding, happy, đám cưới Sang Trang, dam cuoi Sang Trang" />
		<meta name="author" content="Nguyễn Lương Sang" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:locale" content="vn_VN" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="sangtrang.com"/>
		<meta property="og:site_name" content="sangtrang.com"/>
		<meta property="og:image" content="{{ URL::asset('images/cta/cta-pc-1.webp') }}">
		<meta property="og:image:type" content="image/png">
		<meta property="og:description" content="Đám cưới Sang Trang"/>

		<meta name="twitter:image" content="{{ URL::asset('images/cta/cta-pc-1.webp') }}" />
		<meta name="twitter:url" content="sangtrang.com" />
		<meta name="twitter:card" content="Sang Trang" />

		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}"/>
		<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Dosis&family=Great+Vibes&family=Gwendolyn:wght@700&family=Playball&display=swap" rel="stylesheet">
		
		<!-- Bootstrap-icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
		<!-- Animate.css -->
		<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" />
		<!-- Bootstrap  -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" />
		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}" />
		<!-- Theme style  -->
		<link rel="stylesheet" href="/css/<?= config('global.version'); ?>/style.css" />
		<!-- Modernizr JS -->
		<script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
	</head>
	<body>
		@yield('content')

		<!-- jQuery -->
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<!-- jQuery Easing -->
		<script src="{{ URL::asset('js/jquery.easing.1.3.js') }}"></script>
		<!-- Bootstrap -->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
		<!-- Waypoints -->
		<script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
		<!-- Carousel -->
		<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
		<!-- countTo -->
		<script src="{{ URL::asset('js/jquery.countTo.js') }}"></script>
		<!-- Stellar -->
		<script src="{{ URL::asset('js/jquery.stellar.min.js') }}"></script>
		<!-- Magnific Popup -->
		<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ URL::asset('js/magnific-popup-options.js') }}"></script>		
		<script src="{{ URL::asset('js/simplyCountdown.js') }}"></script>

		<!-- cdnjs -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

		<!-- recaptcha -->
		<script src="https://www.google.com/recaptcha/api.js?render=6LcYGGIkAAAAAO9hhdePzalzSoS3MhM0CCQ2iTJ9"></script>

		<!-- Main -->
		<script src="{{ URL::asset('js/clickHeart.js') }}"></script>
		<script src="/js/<?= config('global.version'); ?>/main.js"></script>
	</body>
</html>