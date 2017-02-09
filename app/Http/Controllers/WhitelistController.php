<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use App\Whitelist;
use Illuminate\Http\Request;


class WhitelistController extends Controller
{
    public function create(Request $request)
    {
        // Validate and store the rule...
        $validator = validator::make($request->all(), [
		        'application' => 'required|max:50',
		        'version' => 'required|max:20',
		        'filepath' => 'required|max:500',
		        'filesize' => 'required|numeric',
		        'hash' => 'required|alpha_num|max:50',
		        'justification' => 'required|max:2000',
        ]);

        if (Auth::check()) {
		  $user_id = Auth::user()->id;
		  $user = User::find($user_id);
		} else {
		  $user_id = 0;
		}

        if (!$validator->fails()) {

          $testrule = Whitelist::where('hash', $request->hash)->where('filepath', $request->filepath)->first();
          if (count($testrule) > 0) {
            $validator->errors()->add('duplicate_whitelist', 'A Duplicate Rule Already Exists.');
            return redirect('/scanner-whitelist')->withErrors($validator)->withInput();
          } else {
		    $newrule = new Whitelist;

		    $newrule->contributor = $user_id;
			$newrule->active = 0;
			$newrule->under_review = 1;
			$newrule->approved_by = 0;
			$newrule->hash = $request->hash;
		    $newrule->filepath = $request->filepath;
		    $newrule->filesize = $request->filesize;
		    $newrule->application = $request->application;
		    $newrule->version = $request->version;
		    $newrule->justification = $request->justification;
		    $newrule->rejected = 0;
		    $newrule->save();

            if (Auth::check()) {
              return redirect('/home');
            } else {
              return redirect('/scanner-thankyou');
            }
		  }
        } else {
          return redirect('/scanner-whitelist?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
    }

	public function approve(Request $request) {
		if (Auth::user()->admin == 1) {
		  $rule = Whitelist::find($request->entity_id);
		  if ($request->approve == 1) {
		    $rule->approved_by = Auth::user()->id;
		    $rule->active = 1;
		    $rule->rejected = 0;
		    $rule->save();
		  } else {
		    $rule->approved_by = 0;
			$rule->active = 0;
			$rule->rejected = 1;
		    $rule->save();
		  }
		}
		return redirect('/home');
	}

    public function edit(Request $request)
    {
      $rule = Whitelist::find($request->entity_id);
      if ($rule->approved_by > 0) {
        $user = User::find($rule->approved_by);
        $authorizedby = $user->name;
      } else {
        $authorizedby = 'No One';
      }

      if (Auth::user()->admin == 1) {
        $admin = 1;
      } else {
        $admin = 0;
      }

      if (($admin) or (Auth::user()->id == $rule->contributor)) {
        return view('whitelist-edit', [ 'nav' => 'none', 'authorizedby' => $authorizedby ] )->with('rule',$rule)->with('admin',$admin);
      }
    }

	public function save(Request $request) {
        // Validate and store the rule...
        $validator = validator::make($request->all(), [
		        'application' => 'required|max:50',
		        'version' => 'required|max:20',
		        'filepath' => 'required|max:500',
		        'filesize' => 'required|numeric',
		        'hash' => 'required|alpha_num|max:50',
		        'justification' => 'required|max:2000',
        ]);

        if (!$validator->fails()) {
		    $rule = Whitelist::find($request->entity_id);
		    if (Auth::user()->admin == 1) {
			  $rule->active = $request->approved;
			  $rule->under_review = 0;
			  $rule->hash = $request->hash;
			  $rule->filepath = $request->filepath;
			  $rule->filesize = $request->filesize;
			  $rule->application = $request->application;
			  $rule->version = $request->version;
			  $rule->justification = $request->justification;
		      $rule->rejected = 0;

		      if (($rule->approved_by == 0) and ($request->approved == 1)) {
		        $rule->approved_by = Auth::user()->id;
		        $rule->rejected = 0;
		      } else if ($request->approved == 0) {
		        $rule->rejected = 1;
		      }
		      $rule->save();
		    } else if (Auth::user()->id == $rule->contributor) {
		      $rule->hash = $request->hash;
			  $rule->filepath = $request->filepath;
			  $rule->filesize = $request->filesize;
			  $rule->application = $request->application;
			  $rule->version = $request->version;
			  $rule->justification = $request->justification;
		      $rule->active = 0;
		      $rule->under_review = 1;
		      $rule->approved_by = 0;
		      $rule->rejected = 0;
		      $rule->save();
		    }
		    return redirect('/home');
        } else {
          return redirect('/whitelist-edit?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
	}
}
