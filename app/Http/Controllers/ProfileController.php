<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $req)
    {
        // dd($req);
        $validated = $req->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:users',
            'prof_picture' => 'mimes:jpg,jpeg,svg,png',
            'password' => 'min:8|max:255',
            'confirm_password' => 'same:password|min:8|max:255',
            'wa_number' => 'required|numeric',
            'address' => 'required',
            'card_number' => 'required|numeric|max:16|max:16'
        ]);

        if($req->prof_picture){

        }

        $validated['password'] = bcrypt($validated['password']);

        // kalau 1 berarti courses, elsenya trainee
        if ($req->role_id == 1) {
            // Course::create($validated);
        } else {
            // $user = User::create($validated);
            // Wishlist::create(['user_id' => $user->id]);
        }
        // Alert::success('Success', 'Register successful! Please login')->showConfirmButton('OK', '#025492');
        return redirect()->route('view-login');
    }
}
