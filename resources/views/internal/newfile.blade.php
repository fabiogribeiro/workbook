@extends('layouts.app')

@section('content')

<div class="uk-width-medium">
  <form method="POST" action="{{ route('internal.createfile') }}" enctype="multipart/form-data">
    @csrf

    <legend class="uk-legend"> Upload file </legend>

    <div class="uk-margin">
      <div class="uk-form-controls">
        <input class="uk-input" id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
      </div>
    </div>

    <div class="uk-margin">
      <div class="uk-form-controls">
        <textarea class="uk-textarea" name="description" id="description" placeholder="Enter description"></textarea>
      </div>
    </div>

    <div class="uk-margin" uk-margin>
      <div uk-form-custom="target: true">
        <input type="file" id="file" name="file">
        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
      </div>
      <button class="uk-button uk-button-default">Submit</button>
    </div>
  </form>
</div>

@endsection
