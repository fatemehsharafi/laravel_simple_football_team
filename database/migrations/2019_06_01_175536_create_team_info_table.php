<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_info', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('info_id');
            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')->on('teams')
                ->onDelete('cascade');

            $table->foreign('info_id')
                ->references('id')->on('teams_info_label')
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
        Schema::dropIfExists('team_info');
    }
}
