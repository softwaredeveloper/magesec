<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function create(Request $request)
    {
        // Validate and store the rule...
        $this->validate($request, [
        'name' => 'required|regex:^[A-Za-z][A-Za-z0-9_-]*$|max:20',
        'rule' => 'required',
        ]);
        return view('scanner-rules');
    }


}