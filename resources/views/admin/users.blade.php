@extends('layouts.app')

@section('content')


<table class = "flex-center">
    @foreach($users as $user)
        <tr>
            <th>ID: {{$user->id}}</th>
            <th>E-mail: {{$user->email}}</th>
            <th>Role: {{$user->role}}</th>
            <th>Birthday: {{$user->birthday}}</th>
            <th>Education Field: {{$user->education_field}}</th>
            <th><button>Edit</button></th>
        </tr>
    @endforeach
</table>


@endsection('content')