<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_info', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('player_id');
            $table->unsignedInteger('info_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');

            $table->foreign('info_id')
                ->references('id')->on('players_info_label')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players_info');
    }
}
