@extends('layouts.app')

@section('content')
<div>
  <div class="home-panel">
    <h1>Learn science</h1>
    <p>Challenges in math, physics and chemistry to learn the theory behind the experiments.</p>
      <a href="{{ route('dashboard') }}">
        <button class="uk-button uk-button-primary">
          Get started
        </button>
      </a>
  </div>

  <div class="home-panel">
    <div class="home-register default-card">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>First time visiting?</h2>
        <h4>Create an account to save your progress</h4>
        <input class="default-input" name="email" placeholder="Email" type="email" required/>
        <input class="default-input" name="password" placeholder="Password" type="password" required/>
        <button type="submit" class="uk-button uk-button-secondary">
          Register
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
