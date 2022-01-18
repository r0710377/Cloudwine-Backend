<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graph_type_id');
            $table->foreignId('weather_station_user_id');
            $table->string('timeframe')->nullable();
            $table->timestamps();

            // Foreign key relation
            $table->foreign('graph_type_id')->references('id')->on('graph_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('weather_station_user_id')->references('id')->on('weather_station_users')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graphs');
    }
}
