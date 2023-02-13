@extends('layouts.master')

@section('content')
    <div class="fh5co-loader"></div>
	<div id="page">
        @include('blocks.nav')
        @include('blocks.header')
        @include('blocks.couple')
        @include('blocks.event')    
        @include('blocks.story')    
        @include('blocks.listwishes')    
        @include('blocks.gallery')    
        @include('blocks.map')  
        @include('blocks.sendwish')
        @include('blocks.footer') 
        @include('blocks.modal') 
	</div>  
    @include('blocks.gototop') 
    @include('blocks.sendwishicon') 
@endsection