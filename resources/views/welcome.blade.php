@extends('layouts.app')

@section('content')
<div class="title m-b-md center">
    {{ config('app.name') }}
</div>

<div class="links center">
    <a href="/books">Books</a>
    <a href="/authors">Authors</a>
    @if(auth()->user())
        @if(auth()->user()->isAdmin())
            <a href="/users">Users</a>
            <!-- put more admin options here -->
        @endif
    @endif
</div>
@endsection
