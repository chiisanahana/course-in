<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function viewRegister()
    {
        return view('register');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'required_with:password|same:password|min:8|max:255',
            'wa_number' => 'required|numeric',
            'address' => 'required'
            // 'terms' => 'required'
            // 'card_number' => ''
        ]);

        // if($validated->fails()){
        //     return redirect('get/view-register')
        //         ->withErrors($req)
        //         ->withInput();
        // }

        $validated['password'] = bcrypt($validated['password']);

        if ($req->role == 1) {
            Course::create($validated);
        } else {
            $user = User::create($validated);
            Wishlist::create(['user_id' => $user->id]);
        }
        Alert::success('Success', 'Register successful! Please login')->showConfirmButton('OK', '#025492');
        return redirect()->route('view-login');
    }
}
