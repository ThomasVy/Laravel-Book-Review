@extends('layouts.app')

@section('content')

<!-- <style>
    table, th, td {
        border: 1px solid black;
    }
</style> -->

<table>
    <th></th>
    <th>ID</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Birthday</th>
    <th>Education Field</th>
    
    @foreach($users as $user)
        <tr>
            <td><button>Edit</button></td>
            <td>{{$user->id}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->birthday}}</td>
            <td>{{$user->education_field}}</td>
        </tr>
    @endforeach
</table>


@endsection('content')