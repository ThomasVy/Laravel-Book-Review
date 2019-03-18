@extends('layouts.app')

@section('content')
<table class = "flex-center">
    foreach($users as $user)
        <tr>
            <th>{{user->id}}</th>
            <th>{{user->email}}</th>
            <th>{{user->role}}</th>
            <th>{{user->birthday}}</th>
            <th>{{user->education_field}}</th>
            <th><button>Edit</button></th>
        </tr>




@endsection('content')