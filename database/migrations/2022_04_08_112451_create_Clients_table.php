<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clients', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Name', 200)->nullable();
            $table->string('ArName', 200)->nullable();
            $table->string('Email', 200)->nullable();
            $table->string('PhoneNumber', 50)->nullable();
            $table->string('Password', 200)->nullable();
            $table->integer('CountryId')->nullable()->index('FK_Clients_Country_CountryId');
            $table->string('PushId', 200)->nullable();
            $table->tinyInteger('Blocked')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Clients');
    }
}
