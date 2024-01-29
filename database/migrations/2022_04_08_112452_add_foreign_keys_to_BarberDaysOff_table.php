<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBarberDaysOffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('BarberDaysOff', function (Blueprint $table) {
            $table->foreign(['BarberId'], 'FK_BarberDaysOff_Barber_BarberId')->references(['Id'])->on('Barbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('BarberDaysOff', function (Blueprint $table) {
            $table->dropForeign('FK_BarberDaysOff_Barber_BarberId');
        });
    }
}
