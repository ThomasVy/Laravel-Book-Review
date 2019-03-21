@extends('layouts.app')

@section('content')

<h1 class='center'>Edit Author</h1>

<div class="card-body">
    <form method="POST" action="/authors/{{$author->id}}">
        @csrf
        @method('PATCH')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Author Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $author->name }}"  autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        
        <div class="form-group row">
            <div class="offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
    </form>
    <form id="delete" action="" method="post">
      @method('DELETE')
      @csrf
      <div class="offset-md-10">
          <button type="submit" class="btn btn-danger">
              {{ __('Delete') }}
          </button>
      </div>
    </div>
    </form>
  </div>
@endsection('content')