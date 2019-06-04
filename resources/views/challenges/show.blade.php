@extends('layouts.app')

@section('content')

<div class="uk-margin-medium-top" uk-grid>
  <div class="uk-width-1-4">
    <div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
      <h3 class="uk-card-title">{{ $subject->title }}</h3>
      <p>Lorem ipsum</p>
    </div>
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
  <div class="uk-width-3-4">
    <div class="uk-background-default">
      <h2>{{ $challenge->title }}</h2>
      <p>{!! $challenge->body_html !!}</p>

      <div class="uk-margin-large-top">
        <ul class="uk-tab" uk-tab>
          <li class="uk-active">
            <a href="#">Questions</a>
          </li>
          <li class="uk-disabled">
            <a href="#">Discussion</a>
          </li>
        </ul>
        <div>
          <ul class="uk-list uk-list-large uk-list-divider">
            @foreach ($challenge->questions as $question)
              <li>
                <p>{{ $question->title }}</p>
                <form method="POST" action="/api/questions/answer">
                  @csrf

                  @if (isset($question->question_data['choices']))
                    <div class="uk-form-controls">
                      @foreach ($question->question_data['choices'] as $i => $choice)
                        <label><input class="uk-radio" type="radio" name="choice" value="{{ chr($i + 65) }}" required>
                          {{ $choice }}
                        </label><br>
                      @endforeach
                      <button class="uk-button uk-button-primary uk-margin-small">Submit</button>
                    </div>
                  @else
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Answer">
                    <button class="uk-button uk-button-primary">Submit</button>
                  @endif
                </form>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
