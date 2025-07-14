<?php

namespace App\Http\Controllers\Message;

use App\Events\MessageSentByUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\MessageUserRequest;
use App\Listeners\OnMessageSentByUserListener;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MessageUserRequest $request, string $id)
    {
        $validate = $request->validated();

        $message = Message::create([
            'message' => $validate['message'],
            'user_id' => Auth::user()->id,
            'post_id' => $id
        ]);

        $post = $message->post;

        $post->participants()->syncWithoutDetaching([Auth::user()->id]);
        
        broadcast(new MessageSentByUserEvent($message))->toOthers();
        
        
        return response()->noContent();
    }
}
