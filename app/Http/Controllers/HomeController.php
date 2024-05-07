<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Service;
use App\Models\Suggest;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services=Service::take(4)->get();
        $events=Event::take(4)->get();
        $destinations=Destination::take(4)->get();
        return view('home.index',compact('services','events','destinations'));
    }

    public function aboutMorocco()
    {
        return view('home.about_morocco');
    }

    // public function artCulture()
    // {
    //     return view('home.art_culture');
    // }
    
    public function suggested(){
        $suggestions=Suggest::all();
        return view('home.suggested',compact('suggestions'));
    }
    
    
    

    
    
    
}
