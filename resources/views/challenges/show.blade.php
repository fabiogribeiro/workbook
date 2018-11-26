@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2> {{ $challenge->title }} </h2>
            <h3> {{ $challenge->answer }} </h3>
            <p> {{ $challenge->body }} </p>
        </div>
    </div>
</div>
@endsection
