<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppSessionEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_session_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event');

            $table->dateTime('date');

            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('app_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_session_events');
    }
}
