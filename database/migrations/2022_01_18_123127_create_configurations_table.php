<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weather_station_id');
            $table->boolean('is_public')->default(false);
            $table->boolean('is_location_alarm')->default(false);
            $table->boolean('is_no_data_alarm')->default(false);
            $table->unsignedInteger('number_of_cycles')->nullable();
            $table->timestamps();

            // Foreign key relation
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
        Schema::dropIfExists('configurations');
    }
}
