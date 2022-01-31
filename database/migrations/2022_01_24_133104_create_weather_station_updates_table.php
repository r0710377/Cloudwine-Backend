<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherStationUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_station_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ota_update_id');
            $table->foreignId('weather_station_id');
            $table->boolean('is_installed')->default(false);
            $table->timestamps();

            // Foreign key relation
            $table->foreign('ota_update_id')->references('id')->on('o_t_a__updates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('weather_station_id')->references('id')->on('weather_stations')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_station_updates');
    }
}
