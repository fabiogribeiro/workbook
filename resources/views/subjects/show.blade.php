@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <p>Title: {{ $subject->title }}</p>
        <p>Domain: {{ $subject->domain }}</p>
       </div>
    </div>
</div>
@endsection
