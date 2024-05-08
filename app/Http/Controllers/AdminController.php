<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Message;
use App\Models\Service;
use App\Models\Suggest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $myProfile = User::find(Auth::user()->id)->Profile;
        $CountUsers=User::all()->count();
        $CountDestinations=Destination::all()->count();
        $CountSuggestions=Suggest::all()->count();
        $CountServices=Service::all()->count();
        $CountEvents=Event::all()->count();
        $CountMessages = Message::where('user_id', Auth::user()->id)->has('event')
        ->with('event') 
        ->count();
        
        return view('admin.dashboard', compact('myProfile','CountSuggestions','CountDestinations','CountMessages','CountEvents','CountServices','CountUsers'));
    }
}
