<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function destroy(Post $post){
        try {
            $post->delete();
            Session::flash('status', __('Usunięto wpis!'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }

    public function store(Request $request)
    {
        $post = $request->has('id') ? Post::find($request->input('id')) : new Post();

        Session::flash('status', $request->has('id') ? __('Zaktualizowano wpis!') : __('Dodano nowy wpis!'));

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->publication_date = date('Y-m-d');
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('user.index');
    }

    public function edit(Post $post)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $post
            ]);
        } catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }

    public function likePost(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $user = Auth::user();

        if (!$post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->attach($user->id);
        }

        return response()->json(['message' => 'Post liked successfully', 'likecount' => $post->likes()->count()]);
    }

    public function unlikePost(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $user = Auth::user();

        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->detach($user->id);
        }

        return response()->json(['message' => 'Post unliked successfully', 'likecount' => $post->likes()->count()]);
    }
}
