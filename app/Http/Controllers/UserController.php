<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Job;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['listjob']]);
    }

    public function index() {
        $user = Auth::user();
        $users = User::with('jobs')->where('id', $user->id)->paginate(4);
        if (!Profile::with('user')->where('user_id', $user->id)->exists()) {
            return view('profile.create')->with('user', $user);
        }
        else {
            return view('user.index')->with('user', $user)->with('users', $users);
        }
    }

    public function listjob(Request $request) {
        if($request->ajax()) {
            $jobs = Job::where('position','like','%'. $request->search .'%')->orWhere('description','like','%'. $request->search .'%')->orderBy('created_at','DESC')->paginate(4);
            $view = (String) view('user.listjob')->with('jobs', $jobs)->render();
            return response()->json(['view' => $view, 'status' => 'success']);
        }
        $jobs = Job::where('position','like','%'. $request->search .'%')->orWhere('description','like','%'. $request->search .'%')->orderBy('created_at','DESC')->paginate(4);
        return view('user.listjob')->with('jobs', $jobs);
    }

    public function viewjob($id) {
        $job = Job::find($id);
        $app = DB::table('job_user')->where('job_id', $id)->where('user_id', Auth::user()->id)->get();
        return view('user.viewjob')->with('job', $job)->with('app', $app);
    }

    public function applyjob($id) {
        $job = Job::find($id);
        $user = Auth::user();
        DB::table('job_user')->insert([
            'job_id' => $job->id,
            'user_id' => $user->id,
        ]);
        return redirect()->route('user');
    }

    public function destroy($id) {
        $job = Job::find($id);
        $user = Auth::user();
        DB::table('job_user')->where('job_id', $job->id)->where('user_id', $user->id)->delete();
        return redirect()->route('user');
    }
}
