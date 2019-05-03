@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-2 offset-md-1">
    <ul class="">
    @foreach ($challengesBySkill as $skill => $challenges)
      <li>
        @php
          $toggleID = str_slug($skill);
          $expanded = $skill === $challenge->skill;
        @endphp
        <a
          data-toggle="collapse"
          href="#{{ $toggleID }}"
          role="button"
          aria-expanded="{{ $expanded ? 'true' : 'false' }}"
          aria-controls="{{ $toggleID }}"
        >
          {{ $skill }}
        </a>
        <div
          class="collapse {{ $expanded ? 'show' : '' }}"
          id="{{ $toggleID }}"
        >
          <ul>
            @foreach ($challenges as $currentChallenge)
              <li>
                <a
                  href="{{ route('challenges.show', ['domain' => $subject->domain,
                                                    'subject' => $subject->slug,
                                                    'challenge' => $currentChallenge->slug]) }}"
                >
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

  <div class="col-md-9">
    <h1>{{ $challenge->title }}</h1>
  </div>

</div>
@endsection
