@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dashboard-panel">
        @foreach ($domains as $domain)
            <div class="dashboard-item">
                <h1> {{ title_case($domain) }} </h1>
                <ul class="list-inline">
                @foreach ($subjects[$domain] as $subject)
                    <li class="list-inline-item">
                        <a href="{{ route('challenges.index', ['domain' => $domain, 'subject' => $subject->slug]) }}">{{ $subject->title }}</a>
                    </li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
