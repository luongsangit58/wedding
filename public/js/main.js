(function () {
	
	'use strict';

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
	    	}
	    }
		});

	};

	var sentWish = function() {
		$('.btn-send-wish').click(function (e) {
			var name = $('#fname').val(),
				email = $('#email').val(),
				content = $('#message').val();
			if (name == '' || email == '' || content == '') {
				$('.content-wish').text('Bạn hãy nhập đầy đủ Tên, Email và Lời chúc gửi đến Sang Trang nhé!');
				$("#errorWish").modal('show');
			} else if ($('#message').val().length < 10) {
				$('.content-wish').text('Lời chúc của bạn dường như hơi ngắn. Hãy nhập lời chúc dài hơn và gửi đến Sang Trang nhé!');
				$("#errorWish").modal('show');
			} else if (name != '' && content != '') {
				$.ajax({
					type: "GET",
					contentType: "application/json; charset=utf-8",
					url: "/wishes/insert",
					data: { 
						'name': name, 
						'email': email, 
						'content': content
					},
					success: function (result) {
						if (result.error == '0') {
							$('#fname').val('');
							$('#email').val('');
							$('#message').val('');
	
							$('.content-wish').text('"'+ content + '"');
							$('.sender-name').text('- '+ name + ' -');
							$('.sender-email').text('['+ obfuscateEmail(email) + ']');

							$("#showWish").modal('show');
						} else {
							$('.content-wish').text('Nội dung bạn nhập có chứa từ "' + result.data + '" chưa đúng chuẩn mực, nhạy cảm và không phù hợp!');
							$("#errorWish").modal('show');
						}
					}
			   });
			} else {
				$('.content-wish').text('Đã có lỗi xảy ra :(');
				$("#errorWish").modal('show');
			}
		});
	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#fh5co-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#fh5co-offcanvas').append(clone2);

		$('#fh5co-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#fh5co-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){
			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};



	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var testimonialCarousel = function(){
		var owl = $('.owl-carousel-fullwidth');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
		});
	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};

	var switchNav = function() {
		var pathname = window.location.pathname.replace('/', '');
		if (pathname == '') {
			$('ul.nav-header li:first-child').addClass('active');
			window.onbeforeunload = function () {
				window.scrollTo(0,0);
			};
		}
		if (pathname != '' && $('ul.nav-header li').hasClass(pathname)) {
			$('.'+pathname).addClass('active');
			
			if (pathname != 'loi-chuc') {
				$([document.documentElement, document.body]).animate({
					scrollTop: $('div [data-scroll-top="'+pathname+'"]').offset().top
				}, 1500);
			}
		}
	};

	var countLoveDays = function() {
		var yourDate = new Date("2012-08-05T00:00:00");
		var days = Math.floor( Math.floor((new Date() - yourDate) / 1000) / 60 / 60 / 24);
		$('.love-days').attr('data-to', days);
		$('.love-days').text(days);
	};

	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut(1500);
	};

	var counter = function() {
		$('.js-counter').countTo({
			formatter: function (value, options) {
				return value.toFixed(options.decimals);
			},
		});
	};

	var counterWayPoint = function() {
		if ($('#fh5co-counter').length > 0 ) {
			$('#fh5co-counter').waypoint( function( direction ) {										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	// Parallax
	var parallax = function() {
		$(window).stellar();
	};

	var lazyLoading = function() {
		$('.lazy').Lazy({
			// your configuration goes here
			scrollDirection: 'vertical',
			effect: 'fadeIn',
			visibleOnly: true,
			onError: function(element) {
				console.log('error loading ' + element.data('src'));
			}
		});
	};

	var obfuscateEmail = function(user_email) {
		var avg, splitted, part1, part2;
		splitted = user_email.split("@");
		part1 = splitted[0];
		avg = part1.length / 2;
		part1 = part1.substring(0, (part1.length - avg));
		part2 = splitted[1];
		return part1 + "****@" + part2;
	};

	$(function(){
		mobileMenuOutsideClick();
		parallax();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		dropdown();
		testimonialCarousel();
		goToTop();
		loaderPage();
		countLoveDays();
		counter();
		counterWayPoint();
		switchNav();
		lazyLoading();
		sentWish();
	});
}());