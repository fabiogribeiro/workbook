@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @foreach ($challenges as $challenge)
                <h2>{{ $challenge->title }}</h2>
                <h3>{{ $challenge->answer }}</h3>
                <p>{{ $challenge->body }}</p>
            @endforeach
        </div>
        <div class="col-md-4">
            @foreach ($subjects as $subject)
                <h4>{{ $subject->title }}</h4>
                <p>{{ $subject->domain }}</p>
            @endforeach
        </div>

    </div>
</div>
@endsection
