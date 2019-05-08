<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppAnalyticsEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_analytics_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_id');

            $table->unsignedBigInteger('metric_id');
            $table->foreign('metric_id')->references('id')->on('app_metrics');

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
        Schema::dropIfExists('app_analytics_events');
    }
}
