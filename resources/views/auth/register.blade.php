@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="default-card auth-card col-md-8 col-lg-4">
      <h2>{{ __('auth.register') }} </h2>
      
      <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="text-center">
          <div>
            <input id="email" type="email" class="w-75 default-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
            
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          
          <div>
            <input id="password" type="password" class="w-75 default-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
            
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
          </button>
          
          <a class="align-bottom btn btn-link" href="{{ route('login') }}">
            {{ __('Have an account? Login') }}
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
