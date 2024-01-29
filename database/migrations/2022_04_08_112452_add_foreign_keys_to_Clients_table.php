<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Clients', function (Blueprint $table) {
            $table->foreign(['CountryId'], 'FK_Clients_Country_CountryId')->references(['Id'])->on('Countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Clients', function (Blueprint $table) {
            $table->dropForeign('FK_Clients_Country_CountryId');
        });
    }
}
