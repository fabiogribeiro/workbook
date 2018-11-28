@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('challenges.create') }}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>

                    <div class="col-md-6">
                        <input id="title" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

                    <div class="col-md-6">
                        <textarea id="body" class="form-control" name="body" required>
                        </textarea>
                   </div>
                </div>

                <div class="form-group row">
                    <label for="answer" class="col-sm-4 col-form-label text-md-right">Answer</label>

                    <div class="col-md-6">
                        <input id="answer" class="form-control" name="answer" value="{{ old('answer') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="answer" class="col-sm-4 col-form-label text-md-right">Subject</label>

                    <div class="col-md-6">
                        <input id="subject" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add challenge
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

