<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Message as ModelsMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Message extends Controller
{
    public function index(){
        $messages = ModelsMessage::where('receiver_id', Auth::user()->professional->id)->get();
        return view('Professional.messages.index', compact('messages'));
    }
}
