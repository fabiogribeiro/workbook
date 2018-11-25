@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('subjects.create') }}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>

                    <div class="col-md-6">
                        <input id="title" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="domain" class="col-md-4 col-form-label text-md-right">Domain</label>

                    <div class="col-md-6">
                        <input id="domain" class="form-control" name="domain" required>
                   </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add subject
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
