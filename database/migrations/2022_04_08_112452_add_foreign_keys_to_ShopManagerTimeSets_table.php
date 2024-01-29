<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToShopManagerTimeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ShopManagerTimeSets', function (Blueprint $table) {
            $table->foreign(['ShopManagerId'], 'FK_ShopManagerTimeSets_ShopManager_ShopManagerId')->references(['Id'])->on('ShopManagers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ShopManagerTimeSets', function (Blueprint $table) {
            $table->dropForeign('FK_ShopManagerTimeSets_ShopManager_ShopManagerId');
        });
    }
}
