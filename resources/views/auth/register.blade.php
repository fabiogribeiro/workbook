@extends('layouts.app')

@section('content')
<div class="uk-display-block uk-width-medium uk-position-relative uk-margin-auto">
  <h2>{{ __('Register') }}</h2>
  
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
      <button class="uk-button uk-margin-right" type="submit">
        {{ __('Register') }}
      </button>
        
      @if (Route::has('password.request'))
        <a class="uk-text-small" href="{{ route('password.request') }}">
          {{ __('Have an account? Log in') }}
        </a>
      @endif
    </div>
  </form>
</div>
@endsection
