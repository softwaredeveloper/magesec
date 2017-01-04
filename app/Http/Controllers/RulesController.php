<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function create(Request $request)
    {
        // Validate and store the rule...
        $validator = validator::make($request->all(), [
        'name' => 'required|regex:^[A-Za-z][A-Za-z0-9_-]*$|max:20',
        'rule' => 'required',
        ]);

        if (!$validator->fails()) {
          file_put_contents('temp/$request->name.'.yar',$rule);
          $result = exec('yara -r '.temp/$request->name.'.yar' temp/testfile.txt');
          print_r($result);

        }
        #return redirect('scanner-rules')
		#            ->withErrors($validator)
        #    ->withInput();
    }


}