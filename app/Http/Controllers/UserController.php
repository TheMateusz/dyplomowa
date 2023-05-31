<?php

namespace App\Http\Controllers;

use App\Models\message;
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

        foreach ($friends as $friend) {
            $unreadCount = Message::where('from', $friend->id)
                ->where('to', Auth::id())
                ->where('is_read', 0)
                ->count();

            $friend->unread = $unreadCount;
        }

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

        foreach ($friends as $friend) {
            $unreadCount = Message::where('from', $friend->id)
                ->where('to', Auth::id())
                ->where('is_read', 0)
                ->count();

            $friend->unread = $unreadCount;
        }

        return view('user.index',[
            'details' => $details,
            'interests' => $interests,
            'posts' => $posts,
            'user' => $user,
            'friends' => $friends,
        ]);
    }
}
