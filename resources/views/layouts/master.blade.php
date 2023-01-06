<!DOCTYPE html>

<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sang Trang</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sang Trang" />
		<meta name="keywords" content="sangtrang.com" />
		<meta name="author" content="Nguyễn Lương Sang" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:locale" content="vn_VN" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Sang Trang"/>
		<meta property="og:url" content="sangtrang.com"/>
		<meta property="og:site_name" content="sangtrang.com"/>
		<meta property="og:image" content="{{ URL::asset('images/cta-1.jpg') }}">
		<meta property="og:image:type" content="image/png">
		<meta property="og:description" content="Đám cưới Sang Trang"/>

		<meta name="twitter:title" content="Sang Trang" />
		<meta name="twitter:image" content="{{ URL::asset('images/cta-1.jpg') }}" />
		<meta name="twitter:url" content="sangtrang.com" />
		<meta name="twitter:card" content="" />

		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}"/>
		<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Dosis&family=Great+Vibes&family=Gwendolyn:wght@700&family=Playball&display=swap" rel="stylesheet">
		
		<!-- Bootstrap-icons-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		<!-- Animate.css -->
		<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" />
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" />
		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}" />
		<!-- Theme style  -->
		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
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
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
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

		<!-- Main -->
		<script src="{{ URL::asset('js/main.js') }}"></script>
		<script src="{{ URL::asset('js/slider.js') }}"></script>
	</body>
</html>