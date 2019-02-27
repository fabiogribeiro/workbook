@extends('layouts.app')

@section('content')
<div class="col-12">
  <div class="d-inline-block mx-xs-auto text-center text-md-left col-md-4 offset-md-1 home-panel">
    <h1>Learn science</h1>
    <p>Challenges in math, physics and chemistry to learn the theory behind the experiments.</p>
      <a href="{{ route('dashboard') }}">
        <button class="btn btn-lg btn-success">
          Get started
        </button>
      </a>
  </div>

  <div class="d-inline-block mx-xs-auto text-center text-md-left col-md-4 offset-md-1 home-panel">
    <div class="home-register">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>First time visiting?</h2>
        <h4>Create an account to save your progress</h4>
        <input class="w-75" name="email" placeholder="Email" type="email" />
        <input class="w-75" name="password" placeholder="Password" type="password" />
        <button type="submit" class="btn btn-primary">
          Register
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
