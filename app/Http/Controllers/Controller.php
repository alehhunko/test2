<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // dd(auth()->user()->id);
        // $user=User::find(1);
        // $filter=$user->messages;
        // dd(compact('filter'));
        return view('main');
    }
}
