<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MalwareRules;
use Artisan;
use PharData;
use Phar;

class RuleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rule:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for updated rules and generates new rules archive';

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
        if (file_exists('public/download/rules-latest.tar.gz')) {
          $file = readlink('public/download/rules-latest.tar.gz');
          $split = explode('rules-',$file);
		  $split = explode('.',$split[1]);
          $filetimestamp = $split[0];
        } else {
          $filetimestamp = 0;
        }

        $latest = MalwareRules::where('active',1)->latest('updated_at')->first();
        $latestchange = strtotime($latest->updated_at);
        if ($latestchange > $filetimestamp) {
          //Generate New Rules Files
          $newtimestamp = time();
          Artisan::call('rule:create', ['type' => 'yara-standard', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'yara-deep', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'grep-standard', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'grep-deep', 'timestamp' => $newtimestamp]);

          $a = new PharData('public/download/rules-'.$newtimestamp.'.tar');
          $a->addFile('public/download/yara-standard-'.$newtimestamp.'.yar');
          $a->addFile('public/download/yara-deep-'.$newtimestamp.'.yar');
          $a->addFile('public/download/grep-standard-'.$newtimestamp.'.txt');
          $a->addFile('public/download/grep-deep-'.$newtimestamp.'.txt');

          $a->compress(Phar::GZ);

          unlink('public/download/rules-'.$newtimestamp.'.tar');
          if (file_exists('public/download/rules-latest.tar.gz')) {
            unlink('public/download/rules-latest.tar.gz');
          }
          symlink(getcwd().'/public/download/rules-'.$newtimestamp.'.tar.gz','public/download/rules-latest.tar.gz');

        }
    }
}
