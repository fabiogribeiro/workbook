@extends('layouts.app')

@section('content')
<div class="uk-container uk-padding">
  <div uk-grid>
    <div class="uk-width-1-3">
      <div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
        <h4>{{ $subject->title }}</h4>
        <p class="uk-text-meta">Lorem ipsum</p>
      </div>
      <ul class="uk-nav-default uk-nav-parent-icon uk-list-divider" uk-nav="multiple: true; duration: 300">
        @foreach ($challengesBySkill as $skill => $challenges)
          <li class="uk-parent {{ $skill === $challenge->skill ? 'uk-open uk-active' : '' }}">
            <a href="#">
              {{ $skill }}
            </a>
            <ul class="uk-nav-sub uk-list uk-list-bullet challenge-list-bullet">
              @foreach ($challenges as $currentChallenge)
                <li class="{{ ($challenge->id === $currentChallenge->id ? 'uk-active' : '')
                            . ($currentChallenge->solved ? ' solved' : '') }}">
                  <a class="uk-text-truncate" href="{{ route('challenges.show', ['domain' => $subject->domain,
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
    <div class="uk-width-2-3">
      <h2>{{ $challenge->title }}</h2>
      <div class="uk-background-default uk-padding-small">
        {!! $challenge->body_html !!}

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
                  <question-form v-bind:question="{{ $question }}">
                  </question-form>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
