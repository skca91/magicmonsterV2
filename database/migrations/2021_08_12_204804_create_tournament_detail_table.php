<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_detail', function (Blueprint $table) {
            $table->integer('tournament_id')->unsigned()->index();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('opponent_user_id')->unsigned()->index();
            $table->foreign('opponent_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('winner');
            $table->boolean('evolutionA');
            $table->boolean('evolutionB');
            $table->boolean('boosterA');
            $table->boolean('boosterB');
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
        Schema::dropIfExists('tournament_detail');
    }
}
