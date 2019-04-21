@extends('layouts.app')

@section('content')
<side-nav
    base-url="/{{ $subject->domain }}/{{ $subject->slug }}/"
    api-url="/api/challenge/"
    v-bind:active-init="{{ $challenge }}"
    v-bind:all-items="{{ json_encode($challengesBySkill) }}"
    v-bind:initial-data="{{ $challenge }}" 
>
    <template slot="header" slot-scope="{ title }">
        <h4 class="side-header">@{{ title }}</h4>
    </template>

    <template slot-scope="{ item }">
        <div class="py-2 overflow-ellipsis">@{{ item.title }}</div>
    </template>

    <template slot="main-content" slot-scope="{ apiData, activeItem }">
        <div class="col-md-8">
            <show-challenge
                v-bind:api-data="apiData"
                v-bind:active-item="activeItem"
            ></show-challenge>
            <solve-challenge-form
                v-bind:challenge-id="activeItem.id"
            ></solve-challenge-form>
        </div>
    </template>
</side-nav>
@endsection
