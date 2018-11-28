@extends('layouts.app')

@section('content')
<challenges-index
    v-bind:subjects="{{ $subjects }}"
    v-bind:challenges="{{ $challenges }}"
></challenges-index>
@endsection
