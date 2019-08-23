<div class="uk-container">
  <div class="page-description-header">
    <h3>Learn, practice or solve challenges</h3>
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
          <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <h4 class="uk-text-truncate">{{ $subject->title }}</h4>
            <p class="uk-text-meta">Lorem ipsum</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endforeach
</div>
