@extends('layouts.app')

@section('content')
<h1 class='center'>Editing {{$book->name}}</h1>

<div class="card-body">
    <form method="POST" action="/books/{{ $book->id }}">
        @csrf
        @method('PATCH')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Book Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $book->name }}"  autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

            <div class="col-md-6">
                <input id="isbn" type="number" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ $book->ISBN }}">

                @if ($errors->has('isbn'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('isbn') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Publication_Year" class="col-md-4 col-form-label text-md-right">{{ __('Publication Year') }}</label>

            <div class="col-md-6">
                <input id="Publication_Year" type="number" class="form-control{{ $errors->has('Publication_Year') ? ' is-invalid' : '' }}" name="Publication_Year" value="{{ $book->publication_year }}" >

                @if ($errors->has('Publication_Year'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Publication_Year') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Publisher" class="col-md-4 col-form-label text-md-right">{{ __('Publisher') }}</label>

            <div class="col-md-6">
                <input id="Publisher" type="text" class="form-control{{ $errors->has('Publisher') ? ' is-invalid' : '' }}" name="Publisher" value="{{ $book->publisher }}" >

                @if ($errors->has('Publisher'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Publisher') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image Link') }}</label>

            <div class="col-md-6">
                <textarea id="Image" name="Image" class="form-control{{ $errors->has('Image') ? ' is-invalid' : '' }}" rows="4" cols="80">{{ $book->image }}</textarea>

                @if ($errors->has('Image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Image') }}</strong>
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
    <form id="delete" action="/books/{{$book->id}}" method="post">
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
