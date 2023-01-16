@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="container">
        <br>
        <h3>Edit ID: {{$wish->id}}</h3>
        <form method="post" action="{{ url('wishes/update') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" id="id" name="id" class="form-control" value="{{$wish->id}}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$wish->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{$wish->email}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{$wish->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" id="key" name="key" class="form-control" value="{{$wish->key}}">
            </div>
            <div class="form-group">
                <label for="sent_email">Sent email</label>
                <input type="text" id="sent_email" name="sent_email" class="form-control" value="{{$wish->sent_email}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/wishes/getAll" class="btn btn-info">Back</a>
        </form>
    </div>
@endsection
