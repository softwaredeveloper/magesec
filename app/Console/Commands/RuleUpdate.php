<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MalwareRules;
use App\Whitelist;
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
        $latest = Whitelist::where('active',1)->latest('updated_at')->first();
        if (strtotime($latest->updated_at) > $latestchange) {
          $latestchange = strtotime($latest->updated_at);
        }

        if ($latestchange > $filetimestamp) {
          //Generate New Rules Files
          $newtimestamp = time();
          Artisan::call('rule:create', ['type' => 'yara-standard', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'yara-deep', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'grep-standard', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'grep-deep', 'timestamp' => $newtimestamp]);
          Artisan::call('rule:create', ['type' => 'modsecurity', 'timestamp' => $newtimestamp]);
          Artisan::call('whitelist:create', ['timestamp' => $newtimestamp]);

          chdir('public/download/');

          if (file_exists('yara-standard.yar')) {
            unlink('yara-standard.yar');
          }
          if (file_exists('yara-deep.yar')) {
            unlink('yara-deep.yar');
          }
          if (file_exists('grep-stanadard.txt')) {
            unlink('grep-standard.txt');
          }
          if (file_exists('grep-deep.txt')) {
            unlink('grep-deep.txt');
          }
          if (file_exists('whitelist.json')) {
		    unlink('whitelist.json');
          }
          if (file_exists('whitelist.json')) {
		    unlink('modescurity.conf');
          }

          copy('yara-standard-'.$newtimestamp.'.yar','yara-standard.yar');
          copy('yara-deep-'.$newtimestamp.'.yar','yara-deep.yar');
          copy('grep-standard-'.$newtimestamp.'.txt','grep-standard.txt');
          copy('grep-deep-'.$newtimestamp.'.txt','grep-deep.txt');
          copy('whitelist-'.$newtimestamp.'.json','whitelist.json');
          copy('modsecurity-'.$newtimestamp.'.conf','modsecurity.conf');

          $a = new PharData('rules-'.$newtimestamp.'.tar');
          $a->addFile('yara-standard.yar');
          $a->addFile('yara-deep.yar');
          $a->addFile('grep-standard.txt');
          $a->addFile('grep-deep.txt');
          $a->addFile('whitelist.json');

          $a->compress(Phar::GZ);

          unlink('rules-'.$newtimestamp.'.tar');
          if (file_exists('rules-latest.tar.gz')) {
            unlink('rules-latest.tar.gz');
          }
          symlink(getcwd().'/rules-'.$newtimestamp.'.tar.gz','rules-latest.tar.gz');

        }
    }
}
