@extends('layouts.app')

@section('content')
<div class="col-12">
  <div class="mx-xs-auto text-center text-md-left col-md-4 offset-md-1 home">
    <h1>Learn science</h1>
    <p>Challenges in math, physics and chemistry to learn the theory behind the experiments.</p>
      <a href="{{ route('dashboard') }}">
      <button class="btn btn-lg btn-success">
        Get started
      </button>
    </a>
  </div>
</div>

@endsection
