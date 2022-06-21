@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)        
        <div class="row pt-1 mt-5">
            <div class="col-3">
                <a href="/profile/{{$post->user->id}}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
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
    @endforeach


        
        <div class="row pt-3 ">
            <div class="col-12 d-flex justify-content-center" >
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>

</div>
@endsection
