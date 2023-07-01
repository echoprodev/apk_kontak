<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    // Page Profile
    public function profile(Request $request)
    {
        return view(
            'pages.profile.editprofile',
            [
                'user' => $request->user()
            ]
        );
    }

    // Update Profile
    public function update(Request $request)
    {
        $request->user()->update([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile')->with('update-profile', 'Profile telah diperbarui');
    }

    // Page Ubah Password
    public function password(Request $request)
    {
        return view(
            'pages.profile.resetpassword',
            [
                'user' => $request->user()
            ]
        );
    }

    // Upadate Password
    public function reset(Request $request)
    {
        $request->user()->update([
            'password'  => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile')->with('update-profile', 'Password Telah Diperbarui');
    }
}
