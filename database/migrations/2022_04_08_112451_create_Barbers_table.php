<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('Barbers')) {
            Schema::create('Barbers', function (Blueprint $table) {
                $table->integer('Id', true);
                $table->string('Name', 100)->nullable();
                $table->string('ArName', 100)->nullable();
                $table->string('Description', 200)->nullable();
                $table->string('ArDescription', 200)->nullable();
                $table->string('Email', 100)->nullable();
                $table->string('PhoneNumber', 50)->nullable();
                $table->string('Photo', 1000)->nullable();
                $table->string('PushId', 200)->nullable();
                $table->integer('ShopManagerId')->nullable()->index('FK_Barbers_ShopManager_UserId');
                $table->integer('CountryId')->nullable()->index('FK_Barbers_Country_CountryId');
                $table->integer('UserId')->nullable()->index('FK_Barbers_User_UserId');
                $table->integer('Order')->nullable()->default(0);
                $table->string('Location', 100)->nullable();
                $table->integer('BufferTime')->nullable()->default(30);
                $table->string('CreatedBy', 50)->nullable();
                $table->timestamp('CreatedTime')->useCurrent();
                $table->timestamp('LastModificationTime')->useCurrentOnUpdate()->useCurrent();
                $table->string('LastModifiedBy', 50)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Barbers');
    }
}
