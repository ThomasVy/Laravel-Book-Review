@extends('layouts.app')

@section('content')

<h2 class='center'>Click to View Subscriptions</h2>
<div style="margin: auto; width: 50%;">

    <table>
        <th>ID</th>
        <th>E-mail</th>
        <th>Role</th>
        <th>Birthday</th>
        <th>Education Field</th>
        
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->education_field}}</td>
            </tr>
        @endforeach
    </table>
</div>


@endsection('content')

@section('scripts')
$(document).ready(function(){

    $('tr').click(function(){
        <!-- change this to subcriptions -->
        window.location = "/home"
        
    });

});

@endsection('scripts')