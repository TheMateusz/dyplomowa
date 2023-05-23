<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;

class ConversationController extends Controller
{
    public function createConversation(Request $request)
    {
        // Tworzenie nowej rozmowy między dwoma użytkownikami
        $conversation = new Conversation();
        $conversation->user1_id = $request->user1_id;
        $conversation->user2_id = $request->user2_id;
        $conversation->save();

        return response()->json(['message' => 'Conversation created successfully'], 201);
    }

    public function sendMessage(Request $request)
    {
        // Dodawanie wiadomości do rozmowy
        $message = new Message();
        $message->conversation_id = $request->conversation_id;
        $message->user_id = $request->user_id;
        $message->content = $request->content;
        $message->save();

        // Emitowanie zdarzenia MessageSent do kanału rozmowy
        event(new MessageSent($message));

        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function getMessages(Request $request)
    {
        // Pobieranie wiadomości dla danej rozmowy
        $conversationId = $request->conversation_id;
        $messages = Message::where('conversation_id', $conversationId)->get();

        return response()->json(['messages' => $messages], 200);
    }
}
