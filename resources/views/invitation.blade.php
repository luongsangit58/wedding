@extends('layouts.master')

@section('content')
    <div class="fh5co-loader"></div>
	<div id="page">
        @include('blocks.nav')
        @include('blocks.header')
        @include('blocks.section')              
        <!-- <div id="map" class="fh5co-map"></div> -->
        @include('blocks.footer') 
	</div>  
    @include('blocks.gototop') 
@endsection