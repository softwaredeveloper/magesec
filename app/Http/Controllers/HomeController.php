<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\MalwareRules;
use App\Whitelist;
use Validator;
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
            ->with('all_rules', MalwareRules::paginate(10))
            ->with('pending_whitelist', Whitelist::all()->where('under_review', 0)->where('approved_by',0)->where('rejected',0))
            ->with('all_whitelist', Whitelist::paginate(10))
          ;
        } else {
          return view('home', [ 'nav' => 'none' ] )
            ->with('my_rules', MalwareRules::all()->where('contributor', Auth::user()->id))
            ->with('my_whitelist', Whitelist::all()->where('contributor', Auth::user()->id))
          ;
        }
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }

    public function update(Request $request)
    {
      if (Auth::check()) {
        $validator = validator::make($request->all(), [
		  'name' => 'required|max:255',
		  'email' => 'required|email|max:255',
		  'password' => 'required|min:6|confirmed',
		  'password_confirmation' => 'required|min:6',
        ]);

        if (!$validator->fails()) {
          $emailuser = User::where('email', $request->email)->first();
          $user = User::find(Auth::user()->id);
          if (isset($emailuser->id)) {
            if ($emailuser->id != $user->id) {
              $validator->errors()->add('duplicate_email', 'This Email Address is Assigned to Another Account.');
            }
          }
        }

        if (!$validator->fails()) {
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();
          return redirect('/home')->withSuccess('Your account has been updated.');
        } else {
          return redirect('/home')->withErrors($validator)->withInput();
        }
      }
    }
}
