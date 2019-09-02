@extends('layouts.app')

@section('content')

<div class="uk-padding gray-bg">
  <div class="uk-container">
    <div class="page-description-header">
      <h3 class="uk-text-bold">Learn, practice or solve challenges</h3>
    </div>

    @foreach ($subjects as $domain => $subjectList)
      <h5 class="uk-heading-line">
        <span>{{ strtoupper($domain) }}</span>
      </h5>


    <div class="uk-margin-small">
      <div class="uk-grid-small uk-child-width-1-3@s uk-text-center uk-text-left@s" uk-grid>
        @foreach ($subjectList as $subject)
        <a class="uk-link-reset uk-button-text" href="{{ route('challenges.index', ['domain' => $domain,
                                                                    'subject' => $subject->slug]) }}">
          <div>
            @include('partials/subjectcard', ['title' => $subject->title, 'description' => 'Lorem ipsum'])
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
