<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function getMessages()
    {
        $messages = Message::with('user')->latest()->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->input('message'),
        ]);

        return response()->json($message);
    }
}
