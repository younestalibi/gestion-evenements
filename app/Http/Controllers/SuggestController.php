<?php

namespace App\Http\Controllers;

use App\Models\Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function index()
    {
        $suggestions = Suggest::paginate(6);
        return view('admin.suggestion.index', compact('suggestions'));
    }

    public function create()
    {
        return view('admin.suggestion.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $suggestion = new Suggest();
        $suggestion->name = $validated['name'];
        $suggestion->description = $validated['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('users/suggestions'), $fileName);
            $suggestion->image = $fileName;
        }

        $suggestion->save();

        return redirect()->back()->with('success', 'Suggestion tour created successfully!');
    }

    public function show($suggestion)
    {
        $suggestion=Suggest::where('name',$suggestion)->first();
        return view('home.suggestion', compact('suggestion'));
    }

    public function edit(Suggest $suggestion)
    {
        return view('admin.suggestion.edit', compact('suggestion'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $suggestion=Suggest::findOrFail($request->id);

        $suggestion->name = $validated['name'];
        $suggestion->description = $validated['description'];

        if ($request->hasFile('image')) {
            if ($suggestion->image) {
                $oldImagePath = public_path('users/suggestions' . $suggestion->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('users/suggestions'), $fileName);
            $suggestion->image = $fileName;
        }
        

        $suggestion->save();

        return redirect()->route('admin.suggestion.index')->with('success', 'Suggestion tour updated successfully!');
    }
    public function destroy(Suggest $suggestion)
    {
        if ($suggestion->image) {
            $imagePath = public_path('users/suggestions' . $suggestion->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $suggestion->delete();
        return response()->json([
            'status' => true,
            'success' => 'suggestion deleted successfully',
        ]);
    }
}
