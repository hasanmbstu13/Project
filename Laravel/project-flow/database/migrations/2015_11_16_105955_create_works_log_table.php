<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('works_id')->unsigned();
            $table->timestamp('started_time');
            $table->timestamp('ended_time');
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
        Schema::drop('works_log');
    }
}
