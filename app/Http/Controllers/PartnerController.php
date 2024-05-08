<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Message;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function index(){
        $myProfile = User::find(Auth::user()->id)->Profile;
        $CountServices=Service::where('user_id', Auth::user()->id)->count();
        $CountMessages = Message::where('user_id', Auth::user()->id)->has('service')
        ->with('service')->count();
        return view('partner.dashboard', compact('myProfile','CountMessages','CountServices'));
    }
}
