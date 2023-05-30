<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages=Message::all();
        $user=User::all();
        return [$messages, $user];
    }
}
