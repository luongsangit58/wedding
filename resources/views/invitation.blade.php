@extends('layouts.master')

@section('content')
<div class="fh5co-loader"></div>
<div id="page">
    @include('blocks.nav')
    <!-- Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="/css/<?= config('global.version'); ?>/slider.css" />
    
    @include('blocks.card') 
</div>
@include('blocks.gototop') 
@endsection

