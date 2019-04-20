@extends('layouts.app')

@section('content')
    <challenges-list
        v-bind:api-data="{{ json_encode($challengesBySkill) }}"
        v-bind:active-item="{{ json_encode($activeSubject) }}"
    ></challenges-list>
@endsection
