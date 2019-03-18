@extends('layouts.app')

@section('content')
<side-nav
    base-url="/{{$activeSubject->domain}}/"
    api-url="/api/challenges/"
    v-bind:active-init="{{ $activeSubject }}"
    v-bind:all-items="{{ $subjects }}"
    v-bind:initial-data="{{ json_encode($challengesBySkill) }}"
>
    <h4 class="side-header" hidden slot="header">{{ title_case(__('domains.' . $activeSubject->domain)) }}</h4>

    <template slot-scope="{ item }">
        <div class="py-2">@{{ item.title }}</div>
    </template>

    <template slot="main-content" slot-scope="{ apiData, activeItem }">
        <challenges-list
            v-bind:api-data="apiData"
            v-bind:active-item="activeItem"
        ></challenges-list>
    </template>
</side-nav>
@endsection
