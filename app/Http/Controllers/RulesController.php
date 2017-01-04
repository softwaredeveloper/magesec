<?php

namespace App\Http\Controllers;

use Auth
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RulesController extends Controller
{

    public function create(Request $request)
    {
        // Validate and store the rule...
        $validator = validator::make($request->all(), [
        'name' => 'required|regex:"^[A-Za-z][A-Za-z0-9_-]*$"|max:20',
        'rule' => 'required',
        ]);

        if (!$validator->fails()) {
          file_put_contents('../temp/'.$request->name.'.yar',$request->rule);
          $result = exec('yara -r ../temp/'.$request->name.'.yar ../temp/testfile.txt');
          print_r($result);
		  if (strlen($result) > 0) {
		    $yaraerror = $result;
		  } else {
		    if (Auth::check()) {
		      $user_id = Auth::user()->id;
		    } else {
		      $user_id = 0;
		    }
		    DB::insert("insert into malware_rules (name, contributor, created_at, updated at, active, under_review, approved_by, type, rules) values('".mysql_real_escape_string($request->name)."',".$user_id.",now(),now(),0,1,0,'STANDARD','".mysql_real_escape_string($request->rule)."')");
		  }
        }


        #return redirect('scanner-rules')
		#            ->withErrors($validator)
        #    ->withInput();
    }


}