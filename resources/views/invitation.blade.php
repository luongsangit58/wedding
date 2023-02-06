@extends('layouts.master')

@section('content')
<div id="page">
    @include('blocks.nav')
    <!-- Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/slider.css') }}" />
    
    @include('blocks.card') 
</div>
@include('blocks.gototop') 
@endsection

