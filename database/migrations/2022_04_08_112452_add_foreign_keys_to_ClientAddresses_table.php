<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ClientAddresses', function (Blueprint $table) {
            $table->foreign(['ClientId'], 'FK_ClientAddresses_Client_ClientId')->references(['Id'])->on('Clients');
            $table->foreign(['CountryId'], 'FK_ClientAddresses_Country_CountryId')->references(['Id'])->on('Countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ClientAddresses', function (Blueprint $table) {
            $table->dropForeign('FK_ClientAddresses_Client_ClientId');
            $table->dropForeign('FK_ClientAddresses_Country_CountryId');
        });
    }
}
