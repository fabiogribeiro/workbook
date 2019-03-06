@extends('layouts.app')

@section('content')
<side-nav
    base-url="/{{ $subject->domain }}/{{ $subject->slug }}/"
    api-url="/api/challenge/"
    v-bind:active-init="{{ $challenge }}"
    v-bind:all-items="{{ $otherChallenges }}"
    v-bind:initial-data="{{ $challenge }}" 
>
    <p hidden slot="header">{{ $challenge->skill }}</p>

    <template slot-scope="{ item }">
        <p>@{{ item.title }}</p>
    </template>

    <template slot="main-content" slot-scope="{ apiData, activeItem }">
        <div class="col-md-6 offset-md-1">
            <show-challenge
                v-bind:api-data="apiData"
                v-bind:active-item="activeItem"
            ></show-challenge>
            <solve-challenge-form
                v-bind:challenge-id="activeItem.id"
                form-label="{{__('Answer')}}"
                submit-label="{{__('Submit')}}"
            ></solve-challenge-form>
        </div>
    </template>
</side-nav>
@endsection
