@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <show-challenge
                title="{{ $challenge->title }}"
                body="{{ $challenge->body }}"
            ></show-challenge>
        </div>
    </div>
</div>
@endsection
