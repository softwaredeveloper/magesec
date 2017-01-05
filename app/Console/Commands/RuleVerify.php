<?php

namespace App\Console\Commands;

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
        $rules = DB::select('select * from malware_rules where under_review = 1 and rejected = 0');
        foreach ($rules as $rule) {
          $results = exec('yara -r temp/'.$rule->name.'.yar /home/magento_versions/');
          if (strlen($result) > 0) {
            DB::update('update malware_rules set under_review = 0, rejected = 1 where entity_id = :entity_id',
              [ 'entity_id' => $rule->entity_id ]);
            //TODO: Send notification to submittor
          } else {
            DB::update('update malware_rules set under_review = 0 where entity_id = :entity_id',
              [ 'entity_id' => $rule->entity_id ]);
          }
          //TODO: Send notification to admins
        }
    }
}
