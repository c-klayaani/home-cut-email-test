<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ShopManagers')) {
            Schema::create('ShopManagers', function (Blueprint $table) {
                $table->integer('Id', true);
                $table->string('Name', 100)->nullable();
                $table->string('Email', 100)->nullable();
                $table->string('PhoneNumber', 50)->nullable();
                $table->integer('AppointmentSeparationMinutes')->nullable()->default(30);
                $table->string('PushId', 200)->nullable();
                $table->integer('CountryId')->nullable()->index('FK_ShopManagers_Country_CountryId');
                $table->integer('UserId')->nullable()->index('FK_ShopManagers_User_UserId');
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
        Schema::dropIfExists('ShopManagers');
    }
}
