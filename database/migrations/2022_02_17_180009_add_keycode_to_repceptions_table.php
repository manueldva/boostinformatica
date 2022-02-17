<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeycodeToRepceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receptions', function (Blueprint $table) {
            $table->enum('ignition',['NOT','YES'])->nullable();
            $table->string('keycode', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receptions', function (Blueprint $table) {
            //
        });
    }
}
