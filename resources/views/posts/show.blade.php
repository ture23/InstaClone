@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row pt-1">
        <div class="col-6">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div>
                            <a href="/profile/{{$post->user->id}}" class="pr-3">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a> 
                            >>>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <p>
                    <span class="font-weight-bold pr-1">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </span> {{$post->caption}}
                </p>
            </div>
        </div>
    </div>
    
    
</div>
@endsection
