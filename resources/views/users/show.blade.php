@extends('layouts.app')

@section('content')
<h1 class='center'>User {{$user->id}}</h1>

<div class="card-body">
    <form method="POST" action="/users/{{$user->id}}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

            <div class="col-md-5">
                <input id="Email" type="text" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" name="Email" value="{{$user->email}}"  autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

            <div class="col-md-5">
              <select id="Role" class="form-control{{ $errors->has('Role') ? ' is-invalid' : '' }}" name="Role">
                <option value="0">-- Choose A Role --</option>
                <option value="Admin" {{$user->role === "Admin" ? 'selected' : ''}}>Admin</option>
                <option value="Subscriber" {{$user->role === "Subscriber" ? 'selected' : ''}}>Subscriber</option>
              </select>
                @if ($errors->has('Role'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Role') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

            <div class="col-md-5">
                <input id="Birthday" type="date" class="form-control{{ $errors->has('Birthday') ? ' is-invalid' : '' }}" name="Birthday" value="{{ $user->birthday }}" >

                @if ($errors->has('Birthday'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Birthday') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="Education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

            <div class="col-md-5">
                <input id="Education_Field" type="string" class="form-control{{ $errors->has('Education_Field') ? ' is-invalid' : '' }}" name="Education_Field" value="{{ $user->education_field }}" >

                @if ($errors->has('Education_Field'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Education_Field') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
    <h4 class ='center' style="margin-top: 15px;">{{ __('Subscriptions') }}</h4>
    <form action="/subscriptions/store/{{$user->id}}" method="post">
      @csrf
        <div class="form-group row">
            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

            <div class="col-md-3">
                <input id="isbn" type="number" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" name="isbn" value="{{ old('isbn') }}" >
            </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Subscription') }}
                </button>

                @if ($errors->has('isbn'))
                <div class="col-md-3">
                        <strong style="color:red;">{{ $errors->first('isbn') }}</strong>
                </div>
                @endif
      </div>
    </form>
    <div style="margin: auto; width: 50%;">
        <table>
            <th>Subscribed Date</th>
            <th>Book ISBN</th>
            <th></th>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{$subscription->timestamp}}</td>
                    <td>{{$subscription->ISBN}}</td>
                    <td>
                      <form method="POST" action="/subscriptions/{{$subscription->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Unsubscribe</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

  </div>
@endsection
