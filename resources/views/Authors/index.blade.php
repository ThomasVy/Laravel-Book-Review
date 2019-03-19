@extends('layouts.app')

@section('content')
<div class='center'>
    @if(auth()->user()->isAdmin())
      <button type="button" onclick="location.href='{{ url('/books/create') }}'"  class="btn btn-primary" >Create a Book</button>
    @endif
    <h1 style="margin-top: 10px;">Authors</h1>
    @foreach($authors as $author)
        <p>{{$author->name}}</p>
    @endforeach
@stop