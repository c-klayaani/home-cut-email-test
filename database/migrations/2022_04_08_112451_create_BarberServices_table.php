<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BarberServices', function (Blueprint $table) {
            $table->integer('BarberId')->default(0);
            $table->integer('ServiceId')->default(0)->index('FK_Barbers_Service_UserId');
            $table->string('CreatedBy', 50)->nullable();
            $table->timestamp('CreatedTime')->useCurrent();
            $table->timestamp('LastModificationTime')->useCurrentOnUpdate()->useCurrent();
            $table->string('LastModifiedBy', 50)->nullable();

            $table->primary(['BarberId', 'ServiceId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BarberServices');
    }
}
