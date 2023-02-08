@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div id="page">
    @include('blocks.nav')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="/css/<?= config('global.version'); ?>/slider.css" />

    <div class="blog-slider lazy" data-src="https://img.freepik.com/premium-photo/sakura-petals-falling-down-romantic-pink-flowers-falling-rain-flying-petals-pink-wide-background-love-romance-concept-neat-wedding-invitation_174187-6950.jpg?w=1308">
        <div class="text-center">
            <div class="title-lucky-draw">
                <button onclick="incNbr()" class="btn btn-primary btn-lucky-draw">QUAY MÃ SỐ MAY MẮN</button>
                <h2>XIN CHÚC MỪNG</h2>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-12">
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3 id="lucky_draw_1" onclick="showWish1()"></h3>
                                    <div class="testimony-slide active lucky_draw_1 text-center">
                                        <div>
                                            <strong class="lucky_draw_1_name"></strong>
                                            <br>
                                            <i class="lucky_draw_1_email"></i>
                                        </div>
                                        <br>
                                        <p class="lucky_draw_1_content"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3 id="lucky_draw_2" onclick="showWish2()"></h3>
                                    <div class="testimony-slide active lucky_draw_2 text-center">
                                        <div>
                                            <strong class="lucky_draw_2_name"></strong>
                                            <br>
                                            <i class="lucky_draw_2_email"></i>
                                        </div>
                                        <br>
                                        <p class="lucky_draw_2_content"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    var speed = 1;

    /* Call this function with a string containing the ID name to
    * the element containing the number you want to do a count animation on.*/
    function incEltNbr(id) {
        elt = document.getElementById(id);
        endNbr = Number(document.getElementById(id).innerHTML);
        incNbrRec(0, endNbr, elt, id);
    }

    /*A recursive function to increase the number.*/
    function incNbrRec(i, endNbr, elt, id) {
        if (i <= endNbr) {
            elt.innerHTML = i;
            setTimeout(function() {//Delay a bit before calling the function again.
                incNbrRec(i + 1, endNbr, elt, id);
            }, speed);
        } else {
            console.log(id);
            $('.'+id).show();
        }
    }

    /*Function called on button click*/
    function incNbr(){
        getLuckyDrawWish();
    }

    function getLuckyDrawWish() {
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
        $.ajax({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            url: "/ma-so-may-man",
            success: function (result) {
                if (result.error == '0') {
                    $('.btn-lucky-draw').remove();
                    $('.title-lucky-draw h2').show();
                    showLuckyDraw(result.lucky_draw_1, result.lucky_draw_2);
                } else {

                }
            }
        });
    }

    function showLuckyDraw(lucky_draw_1, lucky_draw_2) {
        $('#lucky_draw_1').text(lucky_draw_1.key);
        $('#lucky_draw_2').text(lucky_draw_2.key);
        $('#lucky_draw_1').show();
        $('#lucky_draw_2').show();

        $('.lucky_draw_1_content').text('"'+lucky_draw_1.content+'"');
        $('.lucky_draw_1_email').text('['+lucky_draw_1.email+']');
        $('.lucky_draw_1_name').text('- '+lucky_draw_1.name+' -');
        
        $('.lucky_draw_2_content').text('"'+lucky_draw_2.content+'"');
        $('.lucky_draw_2_email').text('['+lucky_draw_2.email+']');
        $('.lucky_draw_2_name').text('- '+lucky_draw_2.name+' -');
        
        incEltNbr("lucky_draw_1");
        incEltNbr("lucky_draw_2");
    }

    function showWish1() {
        $('.lucky-draw-1').show();
    }

    function showWish2() {
        $('.lucky-draw-2').show();
    }

</script>