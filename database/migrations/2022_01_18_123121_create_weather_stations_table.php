<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisation_id')->nullable();
            $table->string('name');
            $table->string('gsm')->unique();
            $table->string('relais_name')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_public')->default(false);
            $table->boolean('is_location_alarm')->default(false);
            $table->boolean('is_no_data_alarm')->default(false);
            $table->unsignedInteger('number_of_cycles')->nullable();
            $table->boolean('manual_relais')->default(false);
            $table->timestamps();

            // Foreign key relation
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_stations');
    }
}
