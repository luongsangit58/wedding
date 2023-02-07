<?php 
    $listIdGallery = range(1, config('global.count_gallery'));
?>
@extends('layouts.master')

@section('content')
<div class="fh5co-loader"></div>
<div id="page">
    @include('blocks.nav')

    <!-- Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/slider.css') }}" />

    <div class="blog-slider lazy" data-src="https://img.freepik.com/premium-photo/sakura-petals-falling-down-romantic-pink-flowers-falling-rain-flying-petals-pink-wide-background-love-romance-concept-neat-wedding-invitation_174187-6950.jpg?w=1308">
        <div class="blog-slider__wrp swiper-wrapper">
        @foreach ($wishes as $id => $wish)
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img data-src="images/gallery/resize/gallery-<?= array_rand($listIdGallery, 1) ?>.webp" class="lazy"/>
                </div>
                <div class="blog-slider__content">
                    <div class="blog-slider__title">{{ $wish->name }}</div>
                    <span><i>[{{ $wish->email }}]</i></span>
                    <div class="blog-slider__text">"{{ $wish->content }}"</div>
                </div>
            </div>
        @endforeach
        </div>
        <?php if (time() < config('global.stop_send_wish')) : ?>
        <div class="btn-invitition text-center">
            <a href="/gui-loi-chuc" class="btn btn-primary">Gửi lời chúc</a>
        </div>
        <?php endif; ?>
        <div class="blog-slider__pagination"></div>
    </div>
</div>
<!-- Slider -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script src="{{ URL::asset('js/slider.js') }}"></script>
@endsection