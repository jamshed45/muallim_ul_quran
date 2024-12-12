<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();


        $validatedData = $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        // Update name
        $user->name = $validatedData['user_name'];

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }


        $profileImage = $user->profile_image;
        if ($request->hasFile('profile_image')) {
            // Delete old profile image
            if ($profileImage && Storage::exists('public/' . $profileImage)) {
                Storage::delete('public/' . $profileImage);
            }
            // Store new profile image
            $profileImage = $request->file('profile_image')->store('uploads/profile_images', 'public');

            $user->profile_image = $profileImage;
        }



        // if ($request->hasFile('profile_image')) {
        //     $file = $request->file('profile_image');
        //     $timestamp = now()->format('YmdHis');
        //     $filename = strtolower($timestamp . '-' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension());
        //     // $profilePath = $file->storeAs('public/uploads/profile', $filename);
        //     // $profileUrl = url('public'.Storage::url($profilePath)); // Generate full URL
        //     $profilePath = $file->storeAs('uploads/profile', $filename);
        //     $profileUrl = Storage::url($profilePath); // Generate full URL
        //     $user->profile_image = $profileUrl;
        // }


        $user->save();



        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
