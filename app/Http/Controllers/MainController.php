<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['welcome', 'about']]);
    }
    
    public function index(Request $request) {
        if($request->user()->hasRole(['Admin']))
        {
            return redirect()->route('admin');
        }
        elseif($request->user()->hasRole(['User']))
        {
            return redirect()->route('user');
        }
    }

    public function welcome() {
        return view('main.welcome');
    }

    public function about() {
        return view('main.about');
    }
}
