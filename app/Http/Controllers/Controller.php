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
        $user_id = auth()->user()->id ?? 'None';
        return view('main', ['user_id' => $user_id]);
    }

    public function admin()
    {
        $user_id = auth()->user()->id ?? 'None';
        return view('admin', ['user_id' => $user_id]);
    }
}
