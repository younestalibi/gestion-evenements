<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{



 
    public function index()
    {
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('account', compact('myProfile'));
    }

    public function UpdateImg(Request $request)
    {
        $myProfile = User::find(Auth::user()->id)->Profile;
        if ($request->hasFile($request->input('img_path'))) {
            $file = $request->file('img_path');
            $extension  = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('users/profile', $fileName);
            $myProfile->img_path = $fileName;
            $myProfile->save();
            return redirect()->back()->with('success', 'Profile Image updated successfully');
        }
    }
    public function update(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['string'],
            'national_id' => ['string'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->messages(),
            ]);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->Profile->lname = $request->lname;
            $user->Profile->address = $request->address;
            $user->Profile->dob = $request->dob;
            $user->Profile->gender = $request->gender;
            $user->Profile->national_id = $request->national_id;
            $user->Profile->phone = $request->phone;
            $user->save();
            $user->Profile->save();
            return response()->json([
                'status' => true,
                'success' => 'Profile Details updated successfully',
            ]);
        }
    }


    public function UpdatePass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->old_password);
            $user->save();
            return redirect()->back()->with('success', 'password updated successfully');
        } else {
            return redirect()->back()->with('error', 'The password is incorrect!');
        }
    }



    public function destroy(Request $request)
    {
        if ($request->accountActivation == 'on') {
            $user = User::find(Auth::user()->id);
            $user->delete();
            return redirect('home');
        }
    }
}
