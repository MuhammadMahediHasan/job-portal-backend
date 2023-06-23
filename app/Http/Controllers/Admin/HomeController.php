<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;

class HomeController
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function messages()
    {
        $messages = Message::query()->get();

        return view('backend.message', compact('messages'));
    }
}
