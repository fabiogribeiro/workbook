<div class="gray-bg container subjects-container">
  <div class="page-description-header">
    <h1>Learn, practice or solve challenges</h1>
  </div>

  @foreach ($subjects as $domain => $subjectList)
    @component('partials.wideheader')
      {{ strtoupper($domain) }}
    @endcomponent

    <div class="my-3 d-flex flex-wrap align-content-start">
      @foreach ($subjectList as $subject)
      <div class="subject-card-wrapper">
        <a
          href="{{ route('challenges.index', ['domain' => $domain,
                                              'subject' => $subject->slug]) }}"
        >
          <div class="subject-card">
            <div class="subject-card-left text-center float-left">
              <p>0/10</p>
            </div>
            <div class="subject-card-right float-left">
              <div class="my-4 mx-3">
                <h3> {{ $subject->title }}</h3>
                <p> Lorem ipsum </p>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  @endforeach
</div>
