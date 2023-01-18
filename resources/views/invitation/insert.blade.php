@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="container">
        <br>
        <h3>Insert Invitation</h3>
        <form method="post" action="{{ url('invitation/insert') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="Bạn ">
            </div>
            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" id="key" name="key" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="name_display">Name display</label>
                <input type="name_display" id="name_display" name="name_display" class="form-control" value=" và người thương">
            </div>
            <div class="form-group">
                <label for="relationship">Relationship</label>
                <input type="relationship" id="relationship" name="relationship" class="form-control" value="chúng tôi">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/invitation/getAll" class="btn btn-info">Back</a>
        </form>
    </div>
@endsection
