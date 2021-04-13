<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Session;
use Auth;
use App\Profile;
use App\Job;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        $user_id = $user->id;
        $users = User::with('jobs','profiles')->orderBy('created_at','DESC')->paginate(6);
        if (!Profile::with('user')->where('user_id', $user_id)->exists()) {
            return view('profile.create')->with('user', $user);
        }
        else {
            return view('admin.index')->with('user', $user)->with('users', $users);
        }
    }

    public function listjob() {
        $jobs = Job::orderBy('created_at','DESC')->paginate(4);
        return view('admin.listjob')->with('jobs', $jobs);
    }

    public function createjob() {
        return view('admin.createjob');
    }

    public function storejob(JobRequest $request) {
        $image = $request->file('image');
        $dp_image = 'image/';
        if ($image==null) {
            $image_name = null;
        }
        else {
            $image_name = str_random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
        }

        $job = new Job;
        $job->position = $request->position;
        $job->company = $request->company;
        $job->salary = $request->salary;
        $job->description = $request->description;
        $job->image = $dp_image . $image_name;
        $job->save();
        Session::flash('flash_message', 'Job has been added');

        return redirect()->route('admin.listjob');
    }

    public function editjob($id) {
        $job = Job::find($id);
        return view('admin.editjob')->with('job', $job);
    }

    public function updatejob(JobRequest $request, $id) {
        $job = Job::find($id);
        if (empty($request->file('image'))) {
            $image_n = $job->image;
        }
        else {
            $image = $request->file('image');
            $dp_image = 'image/';
            $image_name = str_random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
            $image_n = $dp_image . $image_name;
        }

        $job->position = $request->position;
        $job->company = $request->company;
        $job->salary = $request->salary;
        $job->description = $request->description;
        $job->image = $image_n;
        $job->save();
        Session::flash('flash_message', 'Job has been updated');

        return redirect()->route('admin.listjob');
    }

    public function deletejob($id) {
        Job::destroy($id);
        Session::flash('flash_message', 'Job has been deleted');
        return redirect()->route('admin.listjob');
    }

    public function listapp() {
        $users = User::with('jobs','profiles')->orderBy('created_at','DESC')->paginate(6);
        return view('admin.listapp')->with('users', $users);
    }

    public function approval(Request $request, $id) {
        DB::table('job_user')->where('id', $id)->distinct()->update([
            'user_id' => $request->userid,
            'job_id' => $request->jobid,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.listapp');
    }

    public function showuser($id) {
        $user = User::find($id);
        $profile = Profile::find($user->profiles->id);
        return view('admin.showuser')->with('user', $user)->with('profile', $profile);
    }

    public function showjob($id) {
        $job = Job::find($id);
        $app = DB::table('job_user')->where('job_id', $id)->get();
        return view('admin.showjob')->with('job', $job);
    }

    public function listuser() {
        $users = User::with('roles')->orderBy('created_at','DESC')->paginate(6);
        return view('admin.listuser')->with('users', $users);
    }

    public function deleteuser($id) {
        $user = User::find($id);
        Profile::destroy($user->profiles->id);
        User::destroy($id);
        Session::flash('flash_message', 'User has been deleted');
        return redirect()->route('admin.listuser');
    }
}
