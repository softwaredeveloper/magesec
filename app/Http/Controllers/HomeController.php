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
          return view('admin', [ 'nav' => 'none' ] )
            ->with('pending_rules', MalwareRules::all()->where('under_review', 0)->where('approved_by',0)->where('rejected',0))
            ->with('all_rules', MalwareRules::paginate(20)
          );
        } else {
          return view('home', [ 'nav' => 'none' ] )->with('my_rules', MalwareRules::all()->where('contributor', Auth::user()->id));
        }
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
