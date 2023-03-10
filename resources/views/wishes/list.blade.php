@extends('layouts.master')

@section('content')
    <div class="table-responsive">
        <br>
        <h3 class="text-center">Lời chúc [{{ count($wishes) }}]</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Key</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Content</th>
                    <th scope="col" class="text-center">Sent</th>
                    <th scope="col" class="text-center">Time</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishes as $wish)
                <tr>
                    <td><a href="/wishes/update/{{$wish->id}}">{{$wish->name}}</a></td>
                    <td><a href="/wishes/update/{{$wish->id}}">{{$wish->key}}</a></td>
                    <td><a href="/wishes/update/{{$wish->id}}">{{$wish->email}}</a></td>
                    <td><a href="/wishes/update/{{$wish->id}}">{{$wish->content}}</a></td>
                    <td>{{$wish->sent_email}}</td>
                    <td><a href="/wishes/update/{{$wish->id}}">{{$wish->time}}</a></td>
                    <td>
                        <a type="button" href="/wishes/update-sent-email/{{$wish->email}}">Update SE</a> ||
                        <a type="button" href="/wishes/delete/{{$wish->email}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
