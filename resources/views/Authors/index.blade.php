@extends('layouts.app')

@section('content')
<h1 class='center'>Authors</h1>
    <div style="margin-bottom: 10px" class='center'>
        @if(auth()->user()->isAdmin())
        <button type="button" onclick="location.href='{{ url('/books/create') }}'"  class="btn btn-primary" >Add an Author</button>
        @endif
    </div>
    
    <div style="margin: auto; width: 30%;">
        <table>
            <th>Name</th>
            
            @foreach($authors as $author)
                <tr data-url="/authors/{{$author->id}}">
                    <td>{{$author->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection('content')

@section('scripts')
$(document).ready(function(){

    $('tr').click(function(){
        <!-- change this to subcriptions -->
        window.location = $(this).data("url");

    });

});

@endsection('scripts')
