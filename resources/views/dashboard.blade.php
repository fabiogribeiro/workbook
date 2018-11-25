@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($subjects as $subject)
                <h3>{{ $subject->title }}</h3>
                <p>{{ $subject->domain }}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection
