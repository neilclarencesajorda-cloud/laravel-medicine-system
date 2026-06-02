<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        if ($request->hasFile('profile_picture')) {

            $imageName = time() . '.' .
                        $request->profile_picture->extension();

            $request->profile_picture
                    ->move(public_path('profiles'), $imageName);

            $user->profile_picture = $imageName;
        }

        $user->save();

        return redirect('/profile')
            ->with('message', 'Profile updated successfully.')
            ->with('type', 'success');
    }
}