<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('description');
            $table->string('medal');
            $table->string('leader')->default('none');
            $table->string('mascot')->default('none');
            $table->string('points')->default('0');
            $table->string('members')->default('0');
            $table->string('ranking')->default('999');
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
        Schema::dropIfExists('gyms');
    }
}
