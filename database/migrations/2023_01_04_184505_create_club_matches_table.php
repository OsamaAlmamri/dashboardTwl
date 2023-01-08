<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club1_id')->nullable();
            $table->foreign('club1_id')->references('id')->on("clubs")->onDelete('cascade');
            $table->unsignedBigInteger('club2_id')->nullable();
            $table->foreign('club2_id')->references('id')->on("clubs")->onDelete('cascade');
            $table->timestamp("time")->nullable();
            $table->smallInteger('club1_result')->default(0);
            $table->smallInteger('club2_result')->default(0);
            $table->unsignedBigInteger('stadium_id')->nullable();
            $table->foreign('stadium_id')->references('id')->on("stadia")->onDelete('cascade');
            $table->unsignedBigInteger('league_id')->nullable();
            $table->foreign('league_id')->references('id')->on("leagues")->onDelete('cascade');
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
        Schema::dropIfExists('club_matches');
    }


};
