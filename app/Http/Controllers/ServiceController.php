<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    private function isAdmin(){
        return Auth::user()->role=='Administrator';
    }
    public function index()
    {
        $services = Auth::user()->services()->paginate(6); 
        $myProfile = User::find(Auth::user()->id)->profile;
        return view('partner.service.index', compact('myProfile', 'services'));
    }
    public function indexAdmin()
    {
        $services = Service::paginate(6); 
        $myProfile = User::find(Auth::user()->id)->profile;
        return view('admin.service.index', compact('myProfile', 'services'));
    }
    

    public function show(Service $service){
        return view('home.service',compact('service'));
    }
    public function services($service){
        $services=SErvice::where('type',$service)->get();
        return view('home.services',compact('services'));
    }
    public function servicesAll(){
        $services=Service::all();
        return view('home.services',compact('services'));
    }
    public function create()
    {
        $myProfile = User::find(Auth::user()->id)->profile;
        $types=Service::SERVICE_TYPES;

        return view('partner.service.create', compact('myProfile','types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'location' => 'nullable|string|max:255',
            'open_time' => 'nullable',
            'type'=>'required',
            'close_time' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_number' => 'nullable|string|max:20'
        ]);
        $validated['user_id']=Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/services', $fileName);
            $validated['image'] = $fileName;
        }
        Service::create($validated);

        return redirect()->back()->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $myProfile = User::find(Auth::user()->id)->profile;
        $types=Service::SERVICE_TYPES;
        if($this->isAdmin()){
            return view('admin.service.edit', compact('service', 'myProfile','types'));
        }
        return view('partner.service.edit', compact('service', 'myProfile','types'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'location' => 'nullable|string|max:255',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_number' => 'nullable|string|max:20',
            'type'=>'required'
        ]);

        $service = Service::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if (!empty($service->image)) {
                $previousImagePath = public_path('users/services' . $service->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/services', $fileName);

            $validated['image'] = $fileName;
        }

        $service->fill($validated);
        $service->save();
        if($this->isAdmin()){
            return redirect()->route('admin.service.index')->with('success', 'Service updated successfully');
        }
        return redirect()->route('partner.service.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if (!empty($service->image)) {
            $previousImagePath = public_path('users/services/' . $service->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        if($service){
            $service->delete();
        }
        $message = Message::where('user_id',Auth::user()->id)->where('item_id',$service->id)->first();
        if($message){
            $message->delete();
        }

        return response()->json([
            'status' => true,
            'success' => 'Service deleted successfully',
        ]);
    }
}
