@extends('layouts.app')

@section('content')
<side-nav
    base-url="/{{$activeSubject->domain}}/"
    api-url="/api/challenges/"
    v-bind:active-init="{{ $activeSubject }}"
    v-bind:all-items="{{ $subjects }}"
    v-bind:initial-data="{{ json_encode($challengesBySkill) }}"
>
    <p hidden slot="header">{{ title_case(__('domains.' . $activeSubject->domain)) }}</p>

    <template slot-scope="{ item }">
        <subject-item v-bind:item="item"></subject-item>
    </template>

    <template slot="main-content" slot-scope="{ apiData, activeItem }">
        <challenges-list
            v-bind:api-data="apiData"
            v-bind:active-item="activeItem"
        ></challenges-list>
    </template>
</side-nav>
@endsection
