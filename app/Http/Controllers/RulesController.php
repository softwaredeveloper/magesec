<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use App\Traits\Captcha;
use App\MalwareRules;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RulesController extends Controller
{
	use \App\Traits\Captcha;

    public function create(Request $request)
    {
    	$captcha = $this->captchaCheck();

        // Validate and store the rule...
        $typevalues = array('string','yararule');
        $validator = validator::make($request->all(), [
		        'ruletype' => 'required|in:string,yararule',
        ]);

        if (!$validator->fails()) {
          if ($request->ruletype == 'string') {
            $validator = validator::make($request->all(), [
              'name' => 'required|regex:"^[A-Za-z][A-Za-z0-9_-]*$"|max:50',
              'string' => 'required|max:1000',
            ]);
            $rule = 'strings: $="'.str_replace('"','\"',$request->string)."\"\ncondition:any of them";
          } else {
            $validator = validator::make($request->all(), [
              'name' => 'required|regex:"^[A-Za-z][A-Za-z0-9_-]*$"|max:50',
              'rule' => 'required',
            ]);
            $rule = $request->rule;
          }
        }

        $captcha = $this->captchaCheck();
		if (!$captcha) {
		  $validator->fails = 1;
		  $validator->errors()->add('captcha', 'Invalid Capthca Input.');
		}


        if (Auth::check()) {
		  $user_id = Auth::user()->id;
		  $user = User::find($user_id);
		} else {
		  $user_id = 0;
		}
		if ($user_id != 0) {
		  $rule = "meta:\n".'author="'.$user->name.'"'."\n".$rule;
		}

        if (!$validator->fails()) {

          $testrule = MalwareRules::all()->where('name', $request->name)->first();
          if (count($testrule) > 0) {
            $validator->errors()->add('duplicate_name', 'A Rule with this Name Already Exists.');
            return redirect('/scanner-rules?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
          } else {
            $testrule = 'rule '.$request->name."\n{\n".$rule."\n}";
            file_put_contents('../temp/'.$request->name.'.yar',$testrule);
            $result = exec('yara -r ../temp/'.$request->name.'.yar ../temp/testfile.txt 2>&1');
		    if (strlen($result) > 0) {
		      $yaraerror = $result;

		    } else {
		      $newrule = new MalwareRules;

		      $newrule->name = $request->name;
		      $newrule->contributor = $user_id;
			  $newrule->active = 0;
			  $newrule->under_review = 1;
			  $newrule->approved_by = 0;
			  $newrule->type = 'STANDARD';
		      $newrule->rule = $rule;
		      $newrule->rejected = 0;
		      $newrule->save();

              if (Auth::check()) {
                return redirect('/home');
              } else {
                return redirect('/scanner-thankyou');
              }
		    }
		  }
        } else {
          return redirect('/scanner-rules?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
        if (isset($yaraerror)) {
          $validator->errors()->add('rule_invalid', $yaraerror);
          return redirect('/scanner-rules?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
    }
    public function edit(Request $request)
    {
      $rule = MalwareRules::find($request->entity_id);
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
        return view('rule-edit', [ 'nav' => 'none', 'authorizedby' => $authorizedby ] )->with('rule',$rule)->with('admin',$admin);
      }
    }

    public function home(Request $request)
    {
      $rules = MalwareRules::where('contributor', '>', 0)
        ->where('active', '=', 1)
        ->join('users', 'users.id', '=', 'malware_rules.contributor')
        ->select('malware_rules.contributor','users.name', DB::raw('count(*) as total'))
        ->groupBy('contributor','name')
        ->orderBy('total','desc')
        ->limit(10)
        ->get();

      return view('scanner', [ 'nav' => 'scanner' ] )->with('rules',$rules);
    }

	public function save(Request $request) {
		$validator = validator::make($request->all(), [
	        'name' => 'required|regex:"^[A-Za-z][A-Za-z0-9_-]*$"|max:50',
	        'rule' => 'required',
	        ]);

        if (!$validator->fails()) {
          $testrule = 'rule '.$request->name."\n{\n".$request->rule."\n}";
          file_put_contents('../temp/'.$request->name.'.yar',$testrule);
          $result = exec('yara -r ../temp/'.$request->name.'.yar ../temp/testfile.txt 2>&1');
          if (strlen($result) > 0) {
		    $yaraerror = $result;
		  } else {
		    $rule = MalwareRules::find($request->entity_id);
		    if (Auth::user()->admin == 1) {
		      $rule->name = $request->name;
		      $rule->rule = $request->rule;
		      $rule->active = $request->active;
		      $rule->type = $request->type;
		      if (($rule->approved_by == 0) and ($request->approved == 1)) {
		        $rule->approved_by = Auth::user()->id;
		        $rule->rejected = 0;
		      } else if ($request->approved == 0) {
		        $rule->rejected = 1;
		      }
		      $rule->save();
		    } else if (Auth::user()->id == $rule->contributor) {
		      $rule->name = $request->name;
			  $rule->rule = $request->rule;
		      $rule->active = 0;
		      $rule->under_review = 1;
		      $rule->approved_by = 0;
		      $rule->rejected = 0;
		      $rule->save();
		    }
		    return redirect('/home');
		  }
        } else {
          return redirect('/rule-edit?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
        if (isset($yaraerror)) {
          $validator->errors()->add('rule_invalid', $yaraerror);
          return redirect('/rule-edit?entity_id='.$request->entity_id)->withErrors($validator)->withInput();
        }
	}

	public function approve(Request $request) {
		if (Auth::user()->admin == 1) {
		  $rule = MalwareRules::find($request->entity_id);
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
}