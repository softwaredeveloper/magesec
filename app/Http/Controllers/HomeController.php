<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
          return view('admin', [ 'nav' => 'none' ] )->with('malware_rules', MalwareRules::all());
        } else {
          return view('home', [ 'nav' => 'none' ] )->with('malware_rules', MalwareRules::all());
        }
    }
}
