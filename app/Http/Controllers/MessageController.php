<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $user = User::all();
        // $auth_id=auth()->user()->id;
        return [$messages, $user, ];
    }

    public function add_client(Request $request)
    {
        $data = $request->validate([
            'content_eath' => 'nullable|string|max:1000',
            'content_family' => 'nullable|string|max:1000',
            'content_work' => 'nullable|string|max:1000',
            'content_policy' => 'nullable|string|max:1000',
            'user_id' => 'integer',
        ]);
        // $client = Message::create($data);
        // $client=Client::all();
        return $data;
    }
}
