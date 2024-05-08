<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(6);
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('admin.event.index', compact('myProfile', 'events'));
    }

    public function show(Event $event){
        return view('home.event',compact('event'));
    }
    public function events(){
        $events=Event::all();
        return view('home.events',compact('events'));
    }
    
    public function create()
    {
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('admin.event.create', compact('myProfile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'seats_available' => 'nullable|integer|min:0',
        ]);
        if ($request->hasFile($request->input('image'))) {
            $event = new Event();
            $file = $request->file('image');
            $extension  = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('users/events', $fileName);
            $validated['image'] = $fileName;
            $event->fill($validated)->save();
            return redirect()->back()->with('success', 'New Event Created successfully');
        }
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('admin.event.edit', compact('event', 'myProfile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'seats_available' => 'nullable|integer|min:0',
        ]);
        $event = Event::find($request->id);
        if ($request->hasFile('image')) {
            if (!empty($event->picture)) {
                $previousPicturePath = public_path('users/events/' . $event->picture);
                if (file_exists($previousPicturePath)) {
                    unlink($previousPicturePath);
                }
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('users/events', $fileName);

            $validated['image'] = $fileName;
        }

        $event->fill($validated)->save();


        return redirect()->route('admin.event.index')->with('success', 'The Event is Updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if (!empty($event->image)) {
            $previousPicturePath = public_path('users/events/' . $event->image);
            if (file_exists($previousPicturePath)) {
                unlink($previousPicturePath);
            }
        }
        if($event){
            $event->delete();
        }

        $message = Message::where('user_id',Auth::user()->id)->where('item_id',$event->id)->first();
        if($message){
            $message->delete();
        }
        
        return response()->json([
            'status' => true,
            'success' => 'event deleted successfully',
        ]);
    }
}
