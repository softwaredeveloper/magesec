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
		if (in_array($type,array('yara-deep','grep-deep','modsecurity'))) {
		  $rules = MalwareRules::all()->where('active',1)->where('type', '!=', 'VULNERABILITY');
		}
		if (in_array($type,array('vulnerability'))) {
		  $rules = MalwareRules::all()->where('active',1)->where('type', 'VULNERABILITY');
		}
		$contents = array();
		#if (in_array($type,array('yara-standard','yara-deep','vulnerability'))) {
        #  array_push($contents,'import "hash"');
		#}
		foreach($rules as $rule) {
		  if (in_array($type,array('yara-standard','yara-deep','vulnerability'))) {
		    $contributor = User::where('id', $rule->contributor)->first();
		    array_push($contents,'rule '.$rule->name);
		    array_push($contents,'{');
		    $lines = explode("\n",$rule->rule);
			foreach ($lines as $line) {
			  array_push($contents,$line);
			}
			array_push($contents,'}');
		  }
		  if (in_array($type,array('grep-standard','grep-deep','modsecurity'))) {
		    if (strpos($rule->rule,'any of them') > 0) {
		      $split = explode("strings:",$rule->rule);
			  $split = explode("condition:",$split[1]);
			  $lines = explode("\n",$split[0]);
              foreach ($lines as $line) {
                $line = trim($line);
                $split = explode('=',$line);
                unset($split[0]);
                $line = implode('=',$split);
                $line = trim($line);
                $line = trim($line,' nocase');
                $line = trim($line,'"');
                $line = trim($line,"'");
                if (strlen($line) > 0) {
                  if (preg_match('/^[\/]/',$line) or ($type == 'modsecurity')) {
				    $line = trim($line,"/");
				    array_push($contents,$line);
                  } else {
                    $line = addcslashes($line,'$@"\()[]|*., ');
                    array_push($contents,$line);
                  }
                }
			  }
		    }
		  }
		}
		if (in_array($type,array('modsecurity'))) {
		  $filename = 'public/download/'.$type.'-'.$timestamp.'.conf';
		  $txt = "SecRuleEngine On\nSecRequestBodyAccess On\n";
		  $count = 1000;
		  foreach ($contents as $line) {
		    #Modsecurity cannot properly parse escaped double quotes
		    if (strpos($line,'\"') === false) {
		      $line = addcslashes($line,'@"\()[]*|');
		      $line = str_replace('\\\(','\\(',$line);
		      $line = str_replace('\\\)','\\)',$line);
		      $txt .= 'SecRule REQUEST_BODY "'.$line.'" "phase:2,deny,id:'.$count.'"'."\n";
		      $count++;
		    }
		  }
		} else {
		  $txt = implode("\n",$contents);
		}
		if (in_array($type,array('grep-standard','grep-deep'))) {
		  $filename = 'public/download/'.$type.'-'.$timestamp.'.txt';
		}
		if (in_array($type,array('yara-standard','yara-deep','vulnerability'))) {
		  $filename = 'public/download/'.$type.'-'.$timestamp.'.yar';
		}

		file_put_contents($filename,$txt);
    }
}
