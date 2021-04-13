<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use Session;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    public function store(ProfileRequest $request) {
        $photo = $request->file('photo');
        $dp_photo = 'photo/';
        $photo_name = str_random(6).'_'.$photo->getClientOriginalName();
        $photo->move($dp_photo, $photo_name);

        $cv = $request->file('cv');
        $dp_cv = 'cv/';
        $cv_name = str_random(6).'_'.$cv->getClientOriginalName();
        $cv->move($dp_cv, $cv_name);

        $user = Auth::user();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->address = $request->address;
        $profile->phone = $request->phone;
        $profile->ed_ex = $request->ed_ex;
        $profile->photo = $dp_photo . $photo_name;
        $profile->cv = $dp_cv . $cv_name;
        $profile->save();
        Session::flash('flash_message', 'Your profile has been created');

        return redirect()->route('index');
    }

    public function edit() {
        $user = Auth::user();
        $profile = Profile::find($user->profiles->id);
        return view('profile.edit')->with('user', $user)->with('profile', $profile);
    }

    public function update(Request $request, $id) {
        $p = Profile::find($id);
        if (empty($request->file('photo'))) {
            $photo_n = $p->photo;
        }
        else {
            $photo = $request->file('photo');
            $dp_photo = 'photo/';
            $photo_name = str_random(6).'_'.$photo->getClientOriginalName();
            $photo->move($dp_photo, $photo_name);
            $photo_n = $dp_photo . $photo_name;
        }
        if (empty($request->file('cv'))) {
            $cv_n = $p->cv;
        }
        else {
            $cv = $request->file('cv');
            $dp_cv = 'cv/';
            $cv_name = str_random(6).'_'.$cv->getClientOriginalName();
            $cv->move($dp_cv, $cv_name);
            $cv_n = $dp_cv . $cv_name;
        }

        $user = Auth::user();

        $user->name = $request->name;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->save();

        $p->address = $request->address;
        $p->phone = $request->phone;
        $p->ed_ex = $request->ed_ex;
        $p->photo = $photo_n;
        $p->cv = $cv_n;
        $p->save();
        Session::flash('flash_message', 'Your profile has been updated');

        return redirect()->route('profiles.show');
    }

    public function show() {
        $user = Auth::user();
        $profile = Profile::find($user->profiles->id);
        return view('profile.profile')->with('user', $user)->with('profile', $profile);
    }
}
