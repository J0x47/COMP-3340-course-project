<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('category_id');
            $table->string('job_title');
            $table->string('job_type');
            $table->string('slug');
            $table->text('description');
            $table->integer('city_id');
            $table->integer('region_id');
            $table->integer('vacancy');
            $table->integer('experience');
            $table->string('gender');
            $table->string('salary');
            $table->date('due_date');
            $table->tinyInteger('status'); // 0:open, 1: paused, 2: closed
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
        Schema::dropIfExists('jobs');
    }
}
