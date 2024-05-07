<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function index(){
        $myProfile = User::find(Auth::user()->id)->Profile;
        $CountUsers=User::all()->count();
        $CountServices=Service::all()->count();
        $CountEvents=Event::all()->count();
        return view('partner.dashboard', compact('myProfile','CountEvents','CountServices','CountUsers'));
    }
}
