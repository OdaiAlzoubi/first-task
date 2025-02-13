<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\User\UserRoleConstants;
use App\Constants\User\UserStatusConstants;
use App\Http\Requests\Message\SendMessageRequest;

class ChatController extends Controller
{
    // php artisan queue:work
    public function index(){
        if(Auth::user()->role == UserRoleConstants::ADMIN){
            $users = User::where('role',UserRoleConstants::ADMIN)->where('status',UserStatusConstants::ACTIVE)->whereKeyNot(Auth::id())->get();
            return view('chat.index',['users' =>$users]);
        }
        $users = User::where('role',UserRoleConstants::STUDENT)->where('status',UserStatusConstants::ACTIVE)->whereKeyNot(Auth::id())->get();
        return view('chat.index',['users' =>$users]);
    }

    public function sendMessage(SendMessageRequest $request) {
        $data=$request->validated();
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $data['receiver_id'],
            'message' => $data['message'],
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['message' => $message], 201);
    }

    public function getMessages(Request $request)
    {
        $userId = Auth::id();
        $receiverId = $request->user_id;

        $messages = Message::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json([
            'messages' => $messages,
            'current_user_id' => $userId
        ]);
    }
}
