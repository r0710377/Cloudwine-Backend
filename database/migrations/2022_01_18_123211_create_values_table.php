<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weather_station_id');
            $table->foreignId('graph_type_id');
            $table->string('value')->nullable();
            $table->string('timestamp');
            $table->timestamps();

            // Foreign key relation
            $table->foreign('graph_type_id')->references('id')->on('graph_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('values');
    }
}
