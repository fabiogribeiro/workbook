@extends('layouts.app')

@section('content')
<div class="uk-padding">
  <div class="uk-display-block uk-width-1-1 uk-width-1-3@m uk-width-1-4@l uk-position-relative uk-margin-auto">
    <h2>{{ __('Login') }}</h2>
    
    <form class="uk-form-stacked" method="POST" action="{{ route('login') }}">
      @csrf
      
      <div class="uk-margin">
        <label class="uk-form-label">Email</label>
        <div class="uk-form-controls">
          <input class="uk-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="uk-margin">
        <label class="uk-form-label">Password</label>
        <div class="uk-form-controls">
          <input class="uk-input" id="password" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
        </div>
        
        @if ($errors->has('password'))
        <span>
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div>
        <button class="uk-button uk-button-primary uk-margin-right" type="submit">
          {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
          <a class="uk-text-small" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
