<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBarberServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('BarberServices', function (Blueprint $table) {
            $table->foreign(['BarberId'], 'FK_BarberServices_Barber_BarberId')->references(['Id'])->on('Barbers');
            $table->foreign(['ServiceId'], 'FK_Barbers_Service_UserId')->references(['Id'])->on('Services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('BarberServices', function (Blueprint $table) {
            $table->dropForeign('FK_BarberServices_Barber_BarberId');
            $table->dropForeign('FK_Barbers_Service_UserId');
        });
    }
}
