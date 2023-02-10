<?php 
    $listIdGallery = range(1, config('global.count_gallery'));
?>
@extends('layouts.master')

@section('content')
<div class="fh5co-loader"></div>
<div id="page" class="bg-card-invitation lazy" data-src="/images/block/card-{{ rand(1, 3) }}.webp">
    <div class="heart-falling x1"></div>
    <div class="heart-falling x2"></div>
    <div class="heart-falling x3"></div>
    <div class="heart-falling x4"></div>
    <div class="heart-falling x5"></div>
    <div class="altheart x6"></div>
    @include('blocks.nav')

    <!-- Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="/css/<?= config('global.version'); ?>/slider.css" />
    
    <div class="blog-slider lazy" data-src="https://img.freepik.com/premium-photo/sakura-petals-falling-down-romantic-pink-flowers-falling-rain-flying-petals-pink-wide-background-love-romance-concept-neat-wedding-invitation_174187-6950.jpg?w=1308">
        <div class="heart-falling x1"></div>
        <div class="heart-falling x2"></div>
        <div class="heart-falling x3"></div>
        <div class="heart-falling x4"></div>
        <div class="heart-falling x5"></div>
        <div class="altheart x6"></div>
        <div class="blog-slider__wrp swiper-wrapper">
            @foreach ($wishes as $id => $wish)
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img data-src="images/gallery/{{ config('global.version') }}/resize/gallery-<?= array_rand($listIdGallery, 1) ?>.webp" class="lazy"/>
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
        <div class="blog-slider__pagination-1">
            <div class="slider__pagination-mb" style="display: none">
                <i class="bi bi-chevron-double-left"></i>
                <i class="bi bi-three-dots"></i>
                <i class="bi bi-chevron-double-right"></i>
            </div>
            <div class="container1 slider__pagination-pc">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
            </div>
        </div>
    </div>
</div>
<!-- Slider -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script src="{{ URL::asset('js/slider.js') }}"></script>
@endsection