<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(Request $req)
    {
        // dd($req);
        $validation = [
            'name' => 'required|max:255|min:3',
            'wa_number' => 'required|numeric'
        ];
        if ($req->email != auth()->guard('user')->user()->email
            && $req->email != auth()->guard('course')->user()->email) {
                $validation['email'] = 'required|email:dns|unique:users';
        }
        if ($req->password) {
            $validation['password'] = 'min:8|max:255';
            $validation['confirm_password'] = 'same:password|min:8|max:255';
        }
        if ($req->card_number) {
            $validation['card_number'] = 'numeric|digits:16|unique:users|unique:courses';
        }
        if ($req->prof_picture) {
            $validation['prof_picture'] = 'mimes:jpg,jpeg,svg,png';
        }
        
        $validated = $req->validate($validation);

        
        if ($req->password) {
            $validated['password'] = bcrypt($validated['password']);
        }
        // course
        if ($req->role == 1) {
            if ($req->prof_picture) {
                Storage::disk('public')->delete(Course::whereId($req->id)->first()->prof_picture);
                $validated['prof_picture'] = $req->file('prof_picture')->store('prof_picture', 'public');
            }

            if ($req->has('checkbox')) {
                $validated['active'] = 0;
            } else {
                $validated['active'] = 1;
            }
            Course::whereId($req->id)->update(array_diff_key($validated, array_flip(['confirm_password'])));
        } else {
            if ($req->prof_picture) {
                Storage::disk('public')->delete(Course::whereId($req->id)->prof_picture);
                $validated['prof_picture'] = $req->files('prof_picture')->store('prof_picture', 'public');
            }

            User::whereId($req->id)->update(array_diff_key($validated, array_flip(['confirm_password'])));
        }
        
        toast('Profile updated successfully', 'success');
        return redirect()->route('dashboard');
    }
}
