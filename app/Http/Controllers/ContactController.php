<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Mail;
use App\Mail\ContactSend;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\MailableMailer;


class ContactController extends Controller
{
    public function send(Request $request)
    {
      $validator = validator::make($request->all(), [
	  	   'subject' => 'required|max:50',
	  	   'body' => 'required',
	     ]);

      if (!$validator->fails()) {
        $users = User::all()->where('admin',1);
        foreach ($users as $user) {
          Mail::to($user->email)->send(new ContactSend($request));
        }
        return view('contact-sent');
      } else {
        return redirect('/contact')->withErrors($validator)->withInput();
      }
    }
}
