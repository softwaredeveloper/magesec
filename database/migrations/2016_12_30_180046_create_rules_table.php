<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malware_rules', function (Blueprint $table) {
            $table->increments('entity_id');
            $table->string('name',200);
            $table->integer('contributor');
            $table->timestamps();
            $table->boolean('active');
            $table->boolean('under_review');
            $table->integer('approved_by');
            $table->string('type',20);
            $table->string('files',2000);
            $table->text('rule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malware_rules');
    }
}
