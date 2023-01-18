@extends('layouts.master')

@section('content')
    <div class="table-responsive">
        <br>
        <h3 class="text-center">Thiệp mời</h3>
        <a href="/invitation/insert" class="btn btn-info text-center">Thêm thiệp mời</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Key</th>
                    <th scope="col" class="text-center">Name display</th>
                    <th scope="col" class="text-center">Relationship</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invitations as $invitation)
                <tr>
                    <td><a href="/invitation/update/{{$invitation->id}}">{{$invitation->name}}</a></td>
                    <td><a href="/thiep-moi/{{$invitation->key}}">{{$invitation->key}}</a></td>
                    <td><a href="/invitation/update/{{$invitation->id}}">{{$invitation->name_display}}</a></td>
                    <td><a href="/invitation/update/{{$invitation->id}}">{{$invitation->relationship}}</a></td>
                    <td><a type="button" href="/invitation/delete/{{$invitation->id}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
