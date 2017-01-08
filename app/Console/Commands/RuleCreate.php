<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MalwareRules;
use App\User;

class RuleCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rule:create {type} {timestamp}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Rules Files';

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
		$type = $this->argument('type');
		$timestamp = $this->argument('timestamp');
		if (in_array($type,array('yara-standard','grep-standard'))) {
		  $rules = MalwareRules::all()->where('active',1)->where('type','STANDARD');
		}
		if (in_array($type,array('yara-deep','grep-deep'))) {
		  $rules = MalwareRules::all()->where('active',1);
		}
		$contents = array();
		if (in_array($type,array('yara-standard','yara-deep'))) {
          array_push($contents,'import "hash"');
		}
		foreach($rules as $rule) {
		  if (in_array($type,array('yara-standard','yara-deep'))) {
		    $contributor = User::where('id', $rule->contributor)->first();
		    array_push($contents,'rule '.$rule->name);
		    array_push($contents,'{');
		    $lines = explode("\n",$rule->rule);
			foreach ($lines as $line) {
			  array_push($contents,$line);
			}
			array_push($contents,'}');
		  }
		  if (in_array($type,array('grep-standard','grep-deep'))) {
		    if (strpos($rule->rule,'any of them') > 0) {
		      $split = explode("strings:",$rule->rule);
			  $split = explode("condition:",$split[1]);
              $set = trim($split[0]);
              $set = str_replace('\"','||',$set);
              $split = explode('"',$set);
              foreach ($split as $string) {
                if ((strlen(trim($string)) > 7) and (strpos($string,"\n") === false)) {
                  array_push($contents,trim(str_replace('||','\"',$string)));
                }
			  }
		    }
		  }
		}
		$txt = implode("\n",$contents);
		if (in_array($type,array('grep-standard','grep-deep'))) {
		  $filename = 'public/download/'.$type.'-'.$timestamp.'.txt';
		}
		if (in_array($type,array('yara-standard','yara-deep'))) {
		  $filename = 'public/download/'.$type.'-'.$timestamp.'.yar';
		}
		file_put_contents($filename,$txt);
    }
}
