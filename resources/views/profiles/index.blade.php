@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" >
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between ">
                <div class="d-flex">
                    <h1 class="pr-5">{{ $user->username }}</h1>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add new Post </a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit" >Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $postCount }} </strong>posts</div>
                <div class="pr-3"><strong>{{ $followersCount }} </strong>followers</div>
                <div class="pr-3"><strong>{{ $followingCount }} </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold"><strong>{{$user->profile->title}}</strong></div>
            <div class="pt-2">{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
    </div>
    
</div>
@endsection
