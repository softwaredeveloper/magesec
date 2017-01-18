<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Whitelist;
use App\User;
use Mail;
use App\Mail\RuleReviewed;

class WhitelistVerify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whitelist:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for new whitelist rules';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rules = Whitelist::all()->where('under_review',1)->where('rejected',0);

        if (count($rules) > 0) {
		  $users = User::all()->where('admin',1);
		  foreach ($users as $user) {
		    Mail::to($user->email)->send(new RuleReviewed());
          }
          foreach ($rules as $rule) {
            $rule->under_review = 0;
            $rule->save();
          }
        }
    }
}
