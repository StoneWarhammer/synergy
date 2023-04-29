<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $request->validated();
        $current_user = auth()->user();
        if (Hash::check($request->password, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Current password does not match.');
        }
    }

    public function validate_image(Request $request)
    {
        $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100',]);
        $image = $request->file('image');
        $path = $image->storeAs('public', 'avatar-' . auth()->id() . '.png');
        return redirect()->back();
    }
}
