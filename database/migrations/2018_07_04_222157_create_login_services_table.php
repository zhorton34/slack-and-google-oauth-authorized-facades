<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('expires_in');
            $table->string('access_token');
            $table->string('refresh_token')->nullable();
            $table->enum('provider', [
                'google', 'slack', 'upwork', 'facebook', 'twitter', 'linkedin', 'github', 'bitbucket'
            ]);
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
        Schema::dropIfExists('login_services');
    }
}
