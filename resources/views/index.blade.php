@extends('layouts.app')

@section('content')
<div>
  <div class="dark-blue-bg">
    <div class="uk-container uk-padding uk-light uk-text-center uk-text-justify uk-width-large">
      <h1>Learn science</h1>
      <p>Challenges in math, physics and chemistry to learn the theory behind the experiments.</p>
        <a href="{{ route('dashboard') }}">
          <button class="uk-button uk-button-primary">
            Get started
          </button>
        </a>
    </div>
  </div>

  <div class="uk-container uk-padding uk-text-center uk-text-justify uk-width-large">
    <div class="">
      <form class="uk-form-stacked" method="POST" action="{{ route('register') }}">
        @csrf
        <h3>First time visiting?</h3>
        <p>Create an account to save your progress</p>

        <div class="uk-margin">
          <div class="uk-form-controls">
            <input class="uk-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-form-controls">
            <input class="uk-input" id="password" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
          </div>
        </div>

        <div>
          <button class="uk-button uk-button-primary" type="submit">
            {{ __('Register') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
