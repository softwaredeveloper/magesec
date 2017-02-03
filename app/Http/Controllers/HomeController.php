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
    public function index(Request $request)
    {
        if (Auth::user()->admin == 1) {
          $filename = 'NO_MATCH';
          $hash = 'NO_MATCH';
          if (isset($request->file)) {
            if ($request->file != '') {
              $filename = '%'.$request->file.'%';
            }
          }
          if (isset($request->hash)) {
		    if ($request->hash != '') {
		      $hash = $request->hash;
		    }
          }
          if (isset($request->rulename)) {
		    if ($request->rulename != '') {
		      $rulename = '%'.$request->rulename.'%';
		    }
          }
          if (isset($rulename)) {
            $rules = MalwareRules::where('name','like',$rulename)->paginate(10);
          } else {
            $rules = MalwareRules::paginate(10);
          }
          $whitelist_pending = Whitelist::where('under_review', 0)->where('approved_by', 0)->where('rejected', 0)->paginate(10);
          $whitelist = Whitelist::where('hash', '=', $hash)->orwhere('filepath', 'like', $filename)->paginate(10);

          return view('admin', [ 'nav' => 'none' ] )
            ->with('pending_rules', MalwareRules::all()->where('under_review', 0)->where('approved_by',0)->where('rejected',0))
            ->with('all_rules', $rules)
            ->with('pending_whitelist', $whitelist_pending)
            ->with('whitelist',$whitelist)
          ;
        } else {
          return view('home', [ 'nav' => 'none' ] )
            ->with('my_rules', MalwareRules::where('contributor', Auth::user()->id)->paginate(10))
            ->with('my_whitelist', Whitelist::where('contributor', Auth::user()->id)->paginate(10))
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
