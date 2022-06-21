<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;


class ProfilesController extends Controller
{
     public function index(\App\Models\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;
        
        $postCount = Cache::remember(
            'count.posts.' . $user->id, 
            now()->addSeconds(120), 
                function () use ($user) {
                    return $user->posts->count();
                });
        
        $followersCount = Cache::remember(
            'count.followers.' . $user->id, 
            now()->addSeconds(120), 
                function () use ($user) {
                    return  $user->profile->followers->count();
                });

       
        $followingCount = Cache::remember(
            'count.following.' . $user->id, 
            now()->addSeconds(120), 
                function () use ($user) {
                    return  $user->following->count();
                });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(\App\Models\User $user )
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));

    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);
        if(request('image')) 
        {
            $imagePath =  request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000); // obradjivanje slika da budu po zelji nebitno kolike velike su slike
            $image->save();
            
            $ImageArray = ['image' => $imagePath];
            
        }
       
        auth()->user()->profile->update(array_merge(
            $data,
            $ImageArray ?? []
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
