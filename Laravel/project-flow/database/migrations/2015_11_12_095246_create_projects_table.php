<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_no')->unsigned();
            $table->string('project_text',8);
            $table->string('project_name',128);
            $table->string('company_name',128);
            $table->timestamp('start_time');
            $table->timestamp('deadline');
            $table->integer('leader_id')->unsigned();
            $table->integer('project_manager')->unsigned();
            $table->text('description');
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
        Schema::drop('projects');
    }
}
