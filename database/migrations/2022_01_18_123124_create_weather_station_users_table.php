<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherStationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_station_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weather_station_id');
            $table->foreignId('user_id');
            $table->string('timeframe_temp')->nullable();
            $table->string('timerframe_hum')->nullable();
            $table->string('timeframe_lux')->nullable();
            $table->timestamps();

            // Foreign key relation
            $table->foreign('weather_station_id')->references('id')->on('weather_stations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_station_users');
    }
}
