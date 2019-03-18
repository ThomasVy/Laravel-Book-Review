@extends('layouts.app')

@section('content')
<div class='center'>
    @if(auth()->user()->isAdmin())
      <button type="button" onclick="location.href='{{ url('/books/create') }}'"  class="btn btn-primary" >Create a Book</button>
    @endif
    <h1 style="margin-top: 10px;">Books</h1>
  <div class="card-body">
    <div class="links">
      @foreach($books as $book)
        <div class='book' style='width:100px; height:200px; display: inline-block; margin: 10px; overflow: hidden;'>
          <a href="/books/{{ $book->id }}">
            <img width='100' height='150' src="{{ $book->image }}"><br>
            <p>{{$book->name}}</p>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection('content')
