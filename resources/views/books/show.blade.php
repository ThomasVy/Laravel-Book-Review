@extends('layouts.app')

@section('content')
  <div class="center">
    <h3 style='width:70%; margin-left: auto; margin-right: auto;'>{{ $book->name }}</h3>
    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.05);">
      <img src="{{ $book->image }}" width='200' height='300' style="margin-bottom: 15px;">
    </div>
    @if(auth()->user())
      @if(auth()->user()->isAdmin())
        <button type="button" style="margin-top: 15px;" onclick="location.href='{{ url('/books/'. $book->id .'/edit') }}'"  class="btn btn-primary" >Edit</button>
      @endif
    @endif
    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.05);">
        <div class="row">
          <label class="col-md-6 col-form-label text-md-right">{{ __('Published By') }}</label>
          <label class="col-md-6 col-form-label text-md-left">{{ $book->publisher }}</label>
        </div>
        <div class="row">
          <label class="col-md-6 col-form-label text-md-right">{{ __('Year') }}</label>
          <label class="col-md-6 col-form-label text-md-left">{{ $book->publication_year }}</label>
        </div>
        <div class="row">
          <label class="col-md-6 col-form-label text-md-right">{{ __('ISBN') }}</label>
          <label class="col-md-6 col-form-label text-md-left">{{ $book->ISBN }}</label>
        </div>
        <div class="row">
          <label class="col-md-6 col-form-label text-md-right">{{ __('Subscription Status') }}</label>
          <label id = status_label class="col-md-6 col-form-label text-md-left">{{ $book->subscription_status }}</label>
          @if(auth()->user())
           @if(auth()->user()->isSubscriber())
              <form id="subscribe_form" style="margin: auto;"  action="/subscriptions" method="POST">
                {{csrf_field()}}
                <input id=subscribe_val type="hidden" name="book_id" value={{$book->id}}> </input>
                <input id="subscribe" type="submit" value="Subscribe!" class="btn btn-primary"></input>

              </form>
            @endif
          @endif
        </div>
        <div class="row">
          <label class="col-md-6 col-form-label text-md-right">{{ __('Added on') }}</label>
          <label class="col-md-6 col-form-label text-md-left">{{$book->timestamp}}</label>
        </div>
    </div>
    <h4 style="margin-top: 15px;">{{ __('Comments') }}</h4>
      @foreach($comments as $comment)
      <div class="row" style="margin-bottom: 10px; border:1px solid #ccc;">
       <label class="col-md-3 text-md-right">{{ $comment->timestamp }}</label>
        <label class="col-md-4 text-md-right">{{ $comment->email }}</label>
        <label class="col-md-5 text-md-left">{{ $comment->text }}</label>
      </div>
      @endforeach
      @if(!Auth::guest() && ($book->hasSubscribed() || Auth::user()->isAdmin()))
        <div class="card-body">
              <form action="/books/{{$book->id}}/comments" method="POST">
                  @csrf
                  <div class="form-group row center">
                      <div class="col-md-9" style="margin-left:auto; margin-right:auto;">
                          <textarea id="Comment" name="Comment" class="form-control{{ $errors->has('Comment') ? ' is-invalid' : '' }}" rows="4" cols="80">{{ old('Comment') }}</textarea>
                      </div>
                      <div class="col-md-9" style="margin-left:auto; margin-right:auto; margin-top:15px;">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Add A Comment') }}
                          </button>
                      </div>
                  </div>
              </form>
              @if ($errors->has('Comment'))
                  <span style='color:red;'>
                      <strong>{{ $errors->first('Comment') }}</strong>
                  </span>
              @endif
        </div>
      @endif
</div>
@endsection

@section('scripts')
$(document).ready(function(){
    var status = {!! json_encode($book->subscription_status) !!};
    var book_id = {!! json_encode($book->id) !!};
    var currentlySubscribed = {!! json_encode($book->isSubscribed()) !!};
    if(status == 0 && currentlySubscribed){
      $('#subscribe').val("Unsubscribe");
      $('#subscribe_form').submit(function(event){
          event.preventDefault();
          <!-- following line needs to change subscription status in DB -->
          window.location = "/home";
      })
    }

    else if(status == 0 && !currentlySubscribed){
      $('#subscribe').attr('type','hidden');
    }

});

@endsection('scripts')
