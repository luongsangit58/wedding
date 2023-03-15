<!DOCTYPE html>

<html lang="vi" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Thơ - Sang Trang</title>
		<meta name="description" content="Thơ - Sang Trang" />
		
		<meta property="og:title" content="Thơ - Sang Trang"/>
		<meta name="twitter:title" content="Thơ - Sang Trang" />
		<meta name="keywords" content="sangtrang.com, sang trang, sangtrang, artical, poem, thơ Sang Trang" />
		<meta name="author" content="Nguyễn Lương Sang" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:locale" content="vn_VN" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="sangtrang.com"/>
		<meta property="og:site_name" content="sangtrang.com"/>
		<meta property="og:image" content="{{ URL::asset('images/cta/cta-pc-1.webp') }}">
		<meta property="og:image:type" content="image/png">
		<meta property="og:description" content="Thơ Sang Trang"/>

		<meta name="twitter:image" content="{{ URL::asset('images/cta/cta-pc-1.webp') }}" />
		<meta name="twitter:url" content="sangtrang.com" />
		<meta name="twitter:card" content="Thơ - Sang Trang" />

		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}"/>
		<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Dosis&family=Great+Vibes&family=Gwendolyn:wght@700&family=Playball&display=swap" rel="stylesheet">
		
		<!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::asset('css/poem/style.css') }}" rel="stylesheet">
	</head>
	<body>
		@yield('content-poem')

		<!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ URL::asset('js/poem/lib/easing/easing.min.js') }}"></script>
        <script src="{{ URL::asset('js/poem/lib/waypoints/waypoints.min.js') }}"></script>
        <!-- Contact Javascript File -->
        <script src="{{ URL::asset('js/poem/mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ URL::asset('js/poem/mail/contact.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{ URL::asset('js/poem/main.js') }}"></script>
	</body>
</html>