<div class="gray-bg container subjects-container">
  <div class="page-description-header">
    <h1>Learn, practice or solve challenges</h1>
  </div>

  @foreach ($subjects as $domain => $subjectList)
    @component('components.wideheader')
      {{ strtoupper($domain) }}
    @endcomponent

    @foreach ($subjectList as $subject)
      <a
        href="{{ route('challenges.index', ['domain' => $domain,
                                            'subject' => $subject->slug]) }}"
      >
        {{ $subject->title }}
      </a>
    @endforeach
  @endforeach
</div>
