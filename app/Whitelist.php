<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    protected $table = 'malware_whitelist';
    protected $primaryKey = 'entity_id';
}
