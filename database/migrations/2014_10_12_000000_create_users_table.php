<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();     // shorthand for $table->bigIncrements('id');
            $table->foreignId('organization_id');
            $table->string('first_name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('gsm')->unique()->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_superadmin')->default(false);
            $table->boolean('can_message')->default(false);
            $table->rememberToken();
            $table->timestamps();

            // Foreign key relation
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
