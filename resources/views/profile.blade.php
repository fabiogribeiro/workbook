@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Solved Challenges</div>
        
        <div class="card-body">
          <ul class="list-unstyled">
            @foreach ($challenges as $challenge)
              <li class="list-item">
                <a href="/">
                  {{ $challenge->title }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
