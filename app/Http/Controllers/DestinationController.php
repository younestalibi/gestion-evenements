<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::paginate(6);
        return view('admin.destination.index', compact('destinations'));
    }

    public function destinationsAll(){
        $destinations=Destination::all();
        return view('home.destinations',compact('destinations'));
    }
    public function create()
    {
        return view('admin.destination.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'places' => 'required|string', 
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destination = new Destination();
        $destination->name = $validated['name'];
        $destination->description = $validated['description'];

        $placesArray = explode(',', $validated['places']);
        $placesArray = array_map('trim', $placesArray); 
        $destination->places = $placesArray;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('users/destinations'), $fileName);
            $destination->image = $fileName;
        }

        $destination->save();

        return redirect()->back()->with('success', 'Destination created successfully!');
    }

    public function show($destination)
    {
        $destination=Destination::where('name',$destination)->first();
        return view('home.destination', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        return view('admin.destination.edit', compact('destination'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'places' => 'required|string', 
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $destination=Destination::findOrFail($request->id);

        $destination->name = $validated['name'];
        $destination->description = $validated['description'];

        if ($request->hasFile('image')) {
            if ($destination->image) {
                $oldImagePath = public_path('users/destinations' . $destination->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('users/destinations'), $fileName);
            $destination->image = $fileName;
        }

        $placesArray = explode(',', $validated['places']);
        $placesArray = array_map('trim', $placesArray); 
        $destination->places = $placesArray;
        

        $destination->save();

        return redirect()->route('admin.destination.index')->with('success', 'Destination updated successfully!');
    }
    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            $imagePath = public_path('users/destinations' . $destination->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $destination->delete();
        return response()->json([
            'status' => true,
            'success' => 'Destination deleted successfully',
        ]);
    }
}
