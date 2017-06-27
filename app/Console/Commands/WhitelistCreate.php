<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Whitelist;
use App\User;

class WhitelistCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whitelist:create {timestamp}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Whitelist File';

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
        $timestamp = $this->argument('timestamp');
        $whitelists = Whitelist::all()->where('active',1);
        $white = array();
        foreach ($whitelists as $whitelist) {
          $white[$whitelist->hash] = $whitelist->filepath;
          $filename = basename($whitelist->filepath);
          if (isset($filesize[$filename])) {
            $filesize[$filename] = array_push($filesize[$filename],$whitelist->filesize);
          } else {
            $filesize[$filename] = array($whitelist->filesize);
          }
        }
        $json = json_encode($white);
        $filename = 'public/download/whitelist-'.$timestamp.'.json';
        file_put_contents($filename,$json);
        $json = json_encode($filesize);
		$filename = 'public/download/filesizewhitelist.json';
        file_put_contents($filename,$json);
    }
}
