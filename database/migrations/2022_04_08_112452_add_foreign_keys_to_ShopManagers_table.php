<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToShopManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ShopManagers', function (Blueprint $table) {
            $table->foreign(['CountryId'], 'FK_ShopManagers_Country_CountryId')->references(['Id'])->on('Countries');
            $table->foreign(['UserId'], 'FK_ShopManagers_User_UserId')->references(['Id'])->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ShopManagers', function (Blueprint $table) {
            $table->dropForeign('FK_ShopManagers_Country_CountryId');
            $table->dropForeign('FK_ShopManagers_User_UserId');
        });
    }
}
