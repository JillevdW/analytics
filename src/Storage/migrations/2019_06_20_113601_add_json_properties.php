<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJsonProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_analytics_events', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });

        Schema::table('app_sessions', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_analytics_events', function (Blueprint $table) {
            $table->dropColumn('properties');
        });

        Schema::table('app_sessions', function (Blueprint $table) {
            $table->dropColumn('properties');
        });
    }
}
