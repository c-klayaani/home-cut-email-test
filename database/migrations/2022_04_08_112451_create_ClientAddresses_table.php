<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClientAddresses', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ClientId')->nullable()->index('FK_ClientAddresses_Client_ClientId');
            $table->integer('CountryId')->nullable()->index('FK_ClientAddresses_Country_CountryId');
            $table->string('City', 150)->nullable();
            $table->string('Street', 150)->nullable();
            $table->string('Area', 150)->nullable();
            $table->string('Building', 100)->nullable();
            $table->string('FloorNb', 50)->nullable();
            $table->string('Notes', 1000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ClientAddresses');
    }
}
