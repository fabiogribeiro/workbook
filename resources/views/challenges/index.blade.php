@extends('layouts.app')

@section('content')
<side-nav
    base-url="/{{$activeSubject->domain}}/"
    api-url="/api/challenges/"
    v-bind:active-init="{{ $activeSubject }}"
    v-bind:all-items="{{ $subjects }}"
>
    <p slot="header">{{ title_case($activeSubject->domain) }}</p>

    <template slot-scope="{ item }">
        <subject-item v-bind:item="item"></subject-item>
    </template>

    <template slot="main-content" slot-scope="{ data }">
        <challenges-list v-bind:data="data"></challenges-list>
    </template>
</side-nav>
@endsection
