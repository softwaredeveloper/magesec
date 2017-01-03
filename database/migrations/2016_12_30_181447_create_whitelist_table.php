<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhitelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malware_whitelist', function (Blueprint $table) {
            $table->increments('entity_id');
            $table->string('application',200);
            $table->string('version',50);
            $table->string('filepath',500);
            $table->integer('filesize');
            $table->string('hash',200);
            $table->string('justification',2000);
            $table->integer('contributor');
            $table->boolean('under_review');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malware_whitelist');
    }
}
