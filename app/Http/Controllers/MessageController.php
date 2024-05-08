<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function adminMessages(){
        $messages = Message::where('user_id', Auth::user()->id)->has('event')
        ->with('event') 
        ->paginate(6);
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('admin.message.index', compact('myProfile', 'messages'));
    }
    public function partnerMessages(){
        
        $messages = Message::where('user_id', Auth::user()->id)->has('service')
        ->with('service')->paginate(6);

        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('partner.message.index', compact('myProfile', 'messages'));
    }
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
            'type' => 'required|in:service,event',
            'item_id' => 'required|integer',
            'user_id' => 'nullable|integer|exists:users,id',
        ]);

        $message = new Message();

        $message->fill($validatedData)->save(); 

        return redirect()->back()->with('success', 'Message submited successfully');

    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json([
            'status' => true,
            'success' => 'Message deleted successfully',
        ]);
    }
}
