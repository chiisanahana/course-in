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
            'email' => 'required|email:dns|unique:users',
            'wa_number' => 'required|numeric'
        ];
        if ($req->password) {
            $validation['password'] = 'min:8|max:255';
            $validation['confirm_password'] = 'same:password|min:8|max:255';
        }
        if ($req->card_number) {
            $validation['card_number'] = 'numeric|max:16|max:16';
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
            $user = Course::where('id', $req->id)->first();
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
            $user = User::where('id', $req->id)->first();
            if ($req->prof_picture) {
                Storage::disk('public')->delete(Course::whereId($req->id)->prof_picture);
                $user->prof_picture = $req->files('prof_picture')->store('prof_picture', 'public');
            }

            // update
            $user->name = $req->name;
            $user->email = $req->email;
            $user->wa_number = $req->wa_number;
            $user->password = $req->password;
            $user->card_number = $req->card_number;
            $user->save();
        }
        
        toast('Profile updated successfully', 'success');
        return redirect()->route('dashboard');
    }
}
