@extends('layouts.app')

@section('content')

<div uk-grid>
  <div class="uk-width-1-4">
    <ul class="uk-nav-default uk-nav-parent-icon uk-list-divider" uk-nav="multiple: true; duration: 300">
      @foreach ($challengesBySkill as $skill => $challenges)
        <li class="uk-parent {{ $skill === $challenge->skill ? 'uk-open uk-active' : '' }}">
          <a href="#">
            {{ $skill }}
          </a>
          <ul class="uk-nav-sub uk-list uk-list-bullet">
            @foreach ($challenges as $currentChallenge)
              <li class="{{ $challenge->id === $currentChallenge->id ? 'uk-active' : '' }}">
                <a href="{{ route('challenges.show', ['domain' => $subject->domain,
                                                      'subject' => $subject->slug,
                                                      'challenge' => $currentChallenge->slug]) }}">
                  {{ $currentChallenge->title }}
                </a>
              </li>
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="uk-background-default uk-width-3-4">
    <h2>{{ $challenge->title }}</h2>
    <p>{!! $challenge->body_html !!}</p>
  </div>
</div>

@endsection
