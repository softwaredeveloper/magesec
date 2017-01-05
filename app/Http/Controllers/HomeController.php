<?php

namespace App\Http\Controllers;

use Auth;
use App\MalwareRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
          $all_rules = MalwareRules::all()->paginate(20);
          return view('admin', [ 'nav' => 'none' ] )
            ->with('pending_rules', MalwareRules::all()->where('under_review', 0)->where('approved_by',0)
            ->with('all_rules', $all_rules)
          );
        } else {
          return view('home', [ 'nav' => 'none' ] )->with('malware_rules', MalwareRules::all()->where('contributor', '=', Auth::user()->id));
        }
    }
}
