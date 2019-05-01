<div class="gray-bg container subjects-container">
  <div class="page-description-header">
    <h1>Learn, practice or solve challenges</h1>
  </div>

  @component('components.wideheader')
    ALL DOMAINS
  @endcomponent

  <div class="subjects-panel">
    @foreach ($subjects as $domain => $subjectList)
    <div class="subjects-item">
      <h1> {{ title_case(__('domains.' . $domain)) }} </h1>
      <ul class="list-inline">
        @foreach ($subjectList as $subject)
        <li class="list-inline-item">
          <a href="{{ route('challenges.index', ['domain' => $domain, 'subject' => $subject->slug]) }}">{{ $subject->title }}</a>
        </li>
        @endforeach
      </ul>
    </div>
    @endforeach
  </div>
</div>
