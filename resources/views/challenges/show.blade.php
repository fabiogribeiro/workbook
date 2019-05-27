@extends('layouts.app')

@section('content')

<div uk-grid>
  <div class="uk-width-1-4">
    <ul class="uk-list-divider uk-list-large" uk-accordion="multiple: true">
      @foreach ($challengesBySkill as $skill => $challenges)
        <li class="{{ $challenge->skill === $skill ? 'uk-open' : '' }}">
          <a class="uk-accordion-title" href="#">
            {{ $skill }}
          </a>
          <div class="uk-accordion-content">
            <ul class="uk-list uk-list-bullet uk-link-reset">
              @foreach ($challenges as $currentChallenge)
                <li>
                  <a href="{{ route('challenges.show', ['domain' => $subject->domain,
                                                        'subject' => $subject->slug,
                                                        'challenge' => $currentChallenge->slug]) }}">
                    {{ $currentChallenge->title }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
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
