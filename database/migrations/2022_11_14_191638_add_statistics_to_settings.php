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
        Schema::table('settings', function (Blueprint $table) {
            //

            $table->text('footer_about')->nullable();
            $table->text('map_ifream')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();

            $table->integer('num_of_projects')->default(1);
            $table->integer('num_of_customers')->default(1);
            $table->integer('num_of_companies')->default(1);
            $table->integer('num_of_clients')->default(1);
            $table->integer('num_of_employees')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
