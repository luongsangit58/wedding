@extends('layouts.master')

@section('content')
	<div id="page">
        @include('blocks.nav')
        @include('blocks.header')
        @include('blocks.gallery')      
        @include('blocks.sendwish') 
        @include('blocks.modal')    
        @include('blocks.footer') 
	</div>  
    @include('blocks.gototop') 
@endsection