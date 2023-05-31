<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $user = User::all();
        return [$messages, $user];
    }

    public function add_client(Request $request)
    {
        $data = $request->validate([
            'content_eath' => 'nullable|string|max:1000',
            'content_family' => 'nullable|string|max:1000',
            'content_work' => 'nullable|string|max:1000',
            'content_policy' => 'nullable|string|max:1000',
            'status' => 'nullable|string|max:1000',
            'coment' => 'nullable|string|max:1000',
            'user_id' => 'integer',
        ]);
        $client = Message::create($data);
        return $client;
    }

    public function finish_status(Message $status)
    {
        $status_id = $status->update(['status'=>'Завершено']);
        return $status_id;
    
    }
    public function work_status(Message $status)
    {
        $status_id = $status->update(['status'=>'В работе']);
        return $status_id;
    }
}
