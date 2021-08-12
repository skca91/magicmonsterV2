<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('probability_evolution');
            $table->float('probability_bonus');
            $table->float('evolution_advantage_effect');
            $table->float('element_benefit_effect');
            $table->float('bonus_advange_effect');
            $table->decimal('maximum_possible_power',42,2);
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
        Schema::dropIfExists('global_configuration');
    }
}
