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
        if (auth()->guard('user')->check()) {
            $credentialChange = false;
            $validation = [
                'name' => 'required|max:255|min:3',
                'wa_number' => 'required|numeric'
            ];

            if ($req->email != auth()->guard('user')->user()->email) {
                $validation['email'] = 'required|email:dns|unique:users|unique:courses';
                $credentialChange = true;
            }
            if ($req->card_number) {
                $validation['card_number'] = 'numeric|digits:16';
            }
            if ($req->password) {
                $validation['password'] = 'min:8|max:255';
                $validation['confirm_password'] = 'same:password|min:8|max:255';
                $credentialChange = true;
            }
            if ($req->prof_picture) {
                $validation['prof_picture'] = 'mimes:jpg,jpeg,svg,png';
            }
            $validated = $req->validate($validation);

            if ($req->password) {
                $validated['password'] = bcrypt($validated['password']);
            }
            if ($req->prof_picture) {
                Storage::disk('public')->delete(User::whereId($req->id)->first()->prof_picture);
                $validated['prof_picture'] = $req->file('prof_picture')->store('prof_picture', 'public');
            }

            User::whereId($req->id)->update(array_diff_key($validated, array_flip(['confirm_password'])));

            if ($credentialChange) {
                toast('Credentials has changed. Please Login!', 'success');
                auth()->guard('user')->logout();
                return redirect()->route('view-login');
            }

        } else {
            // course
            $credentialChange = false;
            $validation = [
                'name' => 'required|max:255|min:3',
                'wa_number' => 'required|numeric'
            ];
            if ($req->card_number) {
                $validation['card_number'] = 'numeric|digits:16';
            }
            if ($req->email != auth()->guard('course')->user()->email) {
                $validation['email'] = 'required|email:dns|unique:users|unique:courses';
                $credentialChange = true;
            }
            if ($req->password) {
                $validation['password'] = 'min:8|max:255';
                $validation['confirm_password'] = 'same:password|min:8|max:255';
                $credentialChange = true;
            }
            if ($req->prof_picture) {
                $validation['prof_picture'] = 'mimes:jpg,jpeg,svg,png';
            }
            $validated = $req->validate($validation);

            if ($req->password) {
                $validated['password'] = bcrypt($validated['password']);
            }
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

            if ($credentialChange) {
                toast('Credentials has changed. Please Login!!', 'success');
                auth()->guard('course')->logout();
                return redirect()->route('view-login');
            }
        }
        toast('Profile updated successfully', 'success');
        return redirect()->route('dashboard');
    }
}
