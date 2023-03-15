(function() {
    var mobileMenuOutsideClick = function() {
        $(document).click(function(e) {
            var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0)
                if ($("body").hasClass("offcanvas")) {
                    $("body").removeClass("offcanvas");
                    $(".js-fh5co-nav-toggle").removeClass("active")
                }
        })
    };
    var showModalError = function(content) {
        $(".content-wish").text(content);
        $("#errorWish").modal("show")
    };
    var sentWish = function() {
        $(".btn-send-wish").click(function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute("6LcYGGIkAAAAAO9hhdePzalzSoS3MhM0CCQ2iTJ9", {
                    action: "submit"
                }).then(function(token) {
                    $("#googleResponse").val(token);
                    var name = $("#fname").val()
                      , email = $("#email").val()
                      , content = $("#message").val()
                      , googleResponse = token;
                    var wishEmailCache = localStorage.getItem("wish_email");
                    if (name == "" || email == "" || content == "")
                        showModalError("B\u1ea1n h\u00e3y nh\u1eadp \u0111\u1ea7y \u0111\u1ee7 T\u00ean, Email v\u00e0 L\u1eddi ch\u00fac g\u1eedi \u0111\u1ebfn Sang Trang nh\u00e9!");
                    else if (intervalButtonSentEmail() == false)
                        showModalError("Vui l\u00f2ng g\u1eedi l\u1eddi ch\u00fac sau 3 ph\u00fat k\u1ec3 t\u1eeb l\u1ea7n g\u1eedi tr\u01b0\u1edbc \u0111\u00f3. Xin c\u1ea3m \u01a1n!");
                    else if (validateEmail(email) == false)
                        showModalError("Email b\u1ea1n nh\u1eadp ch\u01b0a \u0111\u00fang \u0111\u1ecbnh d\u1ea1ng. Vui l\u00f2ng nh\u1eadp l\u1ea1i!");
                    else if (wishEmailCache == email)
                        showModalError("Email " + wishEmailCache + " \u0111\u00e3 t\u1eebng \u0111\u01b0\u1ee3c s\u1eed d\u1ee5ng \u0111\u1ec3 g\u1eedi l\u1eddi ch\u00fac. Vui l\u00f2ng nh\u1eadp email kh\u00e1c!");
                    else if ($("#message").val().length < 10)
                        showModalError("L\u1eddi ch\u00fac c\u1ee7a b\u1ea1n d\u01b0\u1eddng nh\u01b0 h\u01a1i ng\u1eafn. H\u00e3y nh\u1eadp l\u1eddi ch\u00fac d\u00e0i h\u01a1n v\u00e0 g\u1eedi \u0111\u1ebfn Sang Trang nh\u00e9!");
                    else
                        $.ajax({
                            type: "GET",
                            contentType: "application/json; charset=utf-8",
                            url: "/wishes/insert",
                            data: {
                                "name": name,
                                "email": email,
                                "content": content,
                                "google_response": googleResponse
                            },
                            success: function(result) {
                                if (result.error == "0") {
                                    localStorage.setItem("wish_email", email);
                                    localStorage.setItem("wish_sent_email_time", Math.round(+new Date / 1E3));
                                    $("#fname").val("");
                                    $("#email").val("");
                                    $("#message").val("");
                                    $(".content-wish").text('"' + $.trim(content) + '"');
                                    $(".sender-name").text("- " + name + " -");
                                    $(".sender-email").text(email);
                                    $("#showWish").modal("show")
                                } else
                                    showModalError(result.data)
                            }
                        })
                })
            })
        })
    };
    var offcanvasMenu = function() {
        $("#page").prepend('<div id="fh5co-offcanvas" />');
        $("#page").prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white" aria-label="nav"><i></i></a>');
        var clone1 = $(".menu-1 > ul").clone();
        $("#fh5co-offcanvas").append(clone1);
        var clone2 = $(".menu-2 > ul").clone();
        $("#fh5co-offcanvas").append(clone2);
        $("#fh5co-offcanvas .has-dropdown").addClass("offcanvas-has-dropdown");
        $("#fh5co-offcanvas").find("li").removeClass("has-dropdown");
        $(".offcanvas-has-dropdown").mouseenter(function() {
            var $this = $(this);
            $this.addClass("active").find("ul").slideDown(500, "easeOutExpo")
        }).mouseleave(function() {
            var $this = $(this);
            $this.removeClass("active").find("ul").slideUp(500, "easeOutExpo")
        });
        $(window).resize(function() {
            if ($("body").hasClass("offcanvas")) {
                $("body").removeClass("offcanvas");
                $(".js-fh5co-nav-toggle").removeClass("active")
            }
        })
    };
    var burgerMenu = function() {
        $("body").on("click", ".js-fh5co-nav-toggle", function(event) {
            var $this = $(this);
            if ($("body").hasClass("overflow offcanvas"))
                $("body").removeClass("overflow offcanvas");
            else
                $("body").addClass("overflow offcanvas");
            $this.toggleClass("active");
            event.preventDefault()
        })
    };
    var contentWayPoint = function() {
        var i = 0;
        $(".animate-box").waypoint(function(direction) {
            if (direction === "down" && !$(this.element).hasClass("animated-fast")) {
                i++;
                $(this.element).addClass("item-animate");
                setTimeout(function() {
                    $("body .animate-box.item-animate").each(function(k) {
                        var el = $(this);
                        setTimeout(function() {
                            var effect = el.data("animate-effect");
                            if (effect === "fadeIn")
                                el.addClass("fadeIn animated-fast");
                            else if (effect === "fadeInLeft")
                                el.addClass("fadeInLeft animated-fast");
                            else if (effect === "fadeInRight")
                                el.addClass("fadeInRight animated-fast");
                            else
                                el.addClass("fadeInUp animated-fast");
                            el.removeClass("item-animate")
                        }, k * 200, "easeInOutExpo")
                    })
                }, 100)
            }
        }, {
            offset: "85%"
        })
    };
    var dropdown = function() {
        $(".has-dropdown").mouseenter(function() {
            var $this = $(this);
            $this.find(".dropdown").css("display", "block").addClass("animated-fast fadeInUpMenu")
        }).mouseleave(function() {
            var $this = $(this);
            $this.find(".dropdown").css("display", "none").removeClass("animated-fast fadeInUpMenu")
        })
    };
    var testimonialCarousel = function() {
        var owl = $(".owl-carousel-fullwidth");
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: false,
            dots: true,
            smartSpeed: 800,
            autoHeight: true
        })
    };
    var goToTop = function() {
        $(".js-gotop").on("click", function(event) {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: $("html").offset().top
            }, 500, "easeInOutExpo");
            return false
        });
        $(window).scroll(function() {
            var $win = $(window);
            if ($win.scrollTop() > 200)
                $(".js-top").addClass("active");
            else
                $(".js-top").removeClass("active")
        })
    };
    var switchNav = function() {
        var pathname = window.location.pathname.replace("/", "");
        if (pathname == "") {
            $("ul.nav-header li:first-child").addClass("active");
            window.onbeforeunload = function() {
                window.scrollTo(0, 0)
            }
        }
        if (pathname != "" && $("ul.nav-header li").hasClass(pathname)) {
            $("." + pathname).addClass("active");
            if (pathname != "loi-chuc")
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('div [data-scroll-top="' + pathname + '"]').offset().top
                }, 1500)
        }
    };
    var countLoveDays = function() {
        var yourDate = new Date("2012-08-05T00:00:00");
        var days = Math.floor(Math.floor((new Date - yourDate) / 1E3) / 60 / 60 / 24);
        $(".love-days").attr("data-to", days);
        $(".love-days").text(days)
    };
    var loaderPage = function() {
        $(".fh5co-loader").fadeOut(1500)
    };
    var counter = function() {
        $(".js-counter").countTo({
            formatter: function(value, options) {
                return value.toFixed(options.decimals)
            }
        })
    };
    var counterWayPoint = function() {
        if ($("#fh5co-counter").length > 0)
            $("#fh5co-counter").waypoint(function(direction) {
                if (direction === "down" && !$(this.element).hasClass("animated")) {
                    setTimeout(counter, 400);
                    $(this.element).addClass("animated")
                }
            }, {
                offset: "90%"
            })
    };
    var parallax = function() {
        $(window).stellar()
    };
    var intervalButtonSentEmail = function() {
        var timeSentEmail = parseInt(localStorage.getItem("wish_sent_email_time")) ? localStorage.getItem("wish_sent_email_time") : 0;
        if (Math.round(+new Date / 1E3) - parseInt(timeSentEmail) > 3 * 60) {
            localStorage.removeItem("wish_sent_email_time");
            return true
        }
        return false
    };
    var lazyLoading = function() {
        $(".lazy").Lazy({
            scrollDirection: "vertical",
            effect: "fadeIn",
            visibleOnly: true,
            onError: function(element) {
                console.log("error loading " + element.data("src"))
            }
        })
    };
    var validateEmail = function(email) {
        if (email === "")
            return false;
        var regex = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email)
    };
    var obfuscateEmail = function(user_email) {
        var avg, splitted, part1, part2;
        splitted = user_email.split("@");
        part1 = splitted[0];
        avg = part1.length / 2;
        part1 = part1.substring(0, part1.length - avg);
        part2 = splitted[1];
        return part1 + "****@" + part2
    };
    var toggleSendWishTooltip = function() {
        var showTooltip = setInterval(showSendWishTooltip, 2E3);
        function showSendWishTooltip() {
            $(".send-wish-icon-tooltip").addClass("hidden-send-wish-icon-tooltip")
        }
        var hiddenTooltip = setInterval(hiddenSendWishTooltip, 4E3);
        function hiddenSendWishTooltip() {
            $(".send-wish-icon-tooltip").removeClass("hidden-send-wish-icon-tooltip")
        }
        var myTimeout = setTimeout(myGreeting, 5E4);
        function myGreeting() {
            clearInterval(showTooltip);
            clearInterval(hiddenTooltip)
        }
    };
    $(function() {
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
        toggleSendWishTooltip();
        $('[data-toggle="tooltip"]').tooltip()
    })
}
)();
