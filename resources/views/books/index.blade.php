@extends('layouts.app')

@section('content')
<div class='center'>
    @if(auth()->user())
      @if(auth()->user()->isAdmin())
        <button type="button" onclick="location.href='{{ url('/books/create') }}'"  class="btn btn-primary" >Create a Book</button>
      @endif
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

@section('scripts')
$(window).on("load",function(){

    $('img').each(function(){
        if(this.naturalWidth < 10){
            $(this).attr('src', 'https://vector.me/files/images/1/5/151985/none_icon_available_no_unavailable.jpg');
            
        }
    });

});
@stop
