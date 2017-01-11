<?php

namespace App\Console\Commands;

use App\MalwareRules;
use App\User;
use Mail;
use App\Mail\RuleReviewed;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class RuleVerify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rule:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify Yara Rule against false positives';

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
        $rules = MalwareRules::all()->where('under_review',1)->where('rejected',0);


        foreach ($rules as $rule) {

          $result = exec('yara -r temp/'.$rule->name.'.yar /home/magento_versions/');
          if (strlen($result) > 0) {

            if ($rule->contributor > 0) {
              $user = User::find($rule->contributor);
              Mail::to($user->email)->subject('Malware Rule Rejected')->send(new RuleRejected);
            }

            $rule->under_review = 0;
            $rule->rejected = 1;
            $rule->save();

          } else {
		    $users = User::all()->where('admin',1);
		    foreach ($users as $user) {
		      Mail::to($user->email)->send(new RuleReviewed());
            }
            $rule->under_review = 0;
            $rule->save();


          }
        }
    }
}
