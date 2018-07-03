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
            $table->increments('id');
            $table->string('title');
            $table->string('notes')->nullable();
            $table->string('source');
            $table->string('link')->nullable();
            $table->integer('start_length')->nullable();
            $table->integer('end_length')->nullable();
            $table->enum('length_period', ['days', 'weeks', 'months'])->nullable();
            $table->enum('status', ['prospect', 'interviewing', 'active', 'closed', 'paused']);
            $table->date('date_discovered');
            $table->enum('payment_type', ['fixed', 'hourly', 'unknown'])->nullable();
            $table->double('payment_amount')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('rating');
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
