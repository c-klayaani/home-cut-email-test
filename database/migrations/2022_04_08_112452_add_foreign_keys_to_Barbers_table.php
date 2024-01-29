<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBarbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Barbers', function (Blueprint $table) {
            $table->foreign(['CountryId'], 'FK_Barbers_Country_CountryId')->references(['Id'])->on('Countries');
            $table->foreign(['UserId'], 'FK_Barbers_User_UserId')->references(['Id'])->on('Users');
            $table->foreign(['ShopManagerId'], 'FK_Barbers_ShopManager_UserId')->references(['Id'])->on('ShopManagers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Barbers', function (Blueprint $table) {
            $table->dropForeign('FK_Barbers_Country_CountryId');
            $table->dropForeign('FK_Barbers_User_UserId');
            $table->dropForeign('FK_Barbers_ShopManager_UserId');
        });
    }
}
