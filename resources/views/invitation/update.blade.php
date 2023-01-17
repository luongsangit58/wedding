@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="container">
        <br>
        <h3>Invitation edit ID: {{$invitation->id}}</h3>
        <form method="post" action="{{ url('invitation/update') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" id="id" name="id" class="form-control" value="{{$invitation->id}}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$invitation->name}}">
            </div>
            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" id="key" name="key" class="form-control" value="{{$invitation->key}}">
            </div>
            <div class="form-group">
                <label for="name_display">Name display</label>
                <input type="name_display" id="name_display" name="name_display" class="form-control" value="{{$invitation->name_display}}">
            </div>
            <div class="form-group">
                <label for="relationship">Relationship</label>
                <input type="relationship" id="relationship" name="relationship" class="form-control" value="{{$invitation->relationship}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/invitation/getAll" class="btn btn-info">Back</a>
        </form>
    </div>
@endsection
