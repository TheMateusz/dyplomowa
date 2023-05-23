<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $details = $user->details;
        $interests = $user->interests;
        $posts = $user->posts;
        $friends = $user->friends;

        return view('user.index',[
            'details' => $details,
            'interests' => $interests,
            'posts' => $posts,
            'user' => $user,
            'friends' => $friends,
        ]);
    }
    public function show(User $user)
    {
        $details = $user->details;
        $interests = $user->interests;
        $posts = $user->posts;
        $friends = Auth::user()->friends;

        return view('user.show',[
            'details' => $details,
            'interests' => $interests,
            'posts' => $posts,
            'user' => $user,
            'friends' => $friends,
        ]);
    }
}
