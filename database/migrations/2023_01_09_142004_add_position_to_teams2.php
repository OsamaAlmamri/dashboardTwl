<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams2', function (Blueprint $table) {
            $table->enum('position',['Midfielder','Defender','Forworder','GoalKeeper','Coach'])->default('Forworder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams2', function (Blueprint $table) {
            //
        });
    }
};
