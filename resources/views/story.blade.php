@extends('layouts.master')

@section('content')
    <div class="fh5co-loader"></div>
	<div id="page">
        @include('blocks.nav')
        @include('blocks.header')
        @include('blocks.story')     
        @include('blocks.section')     
        @include('blocks.footer') 
	</div>  
    @include('blocks.gototop') 
@endsection