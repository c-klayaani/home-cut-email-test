<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberDaysOffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BarberDaysOff', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('BarberId')->nullable()->index('FK_BarberDaysOff_Barber_BarberId');
            $table->date('OffDate')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->timestamp('CreatedTime')->useCurrent();
            $table->timestamp('LastModificationTime')->useCurrentOnUpdate()->useCurrent();
            $table->string('LastModifiedBy', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BarberDaysOff');
    }
}
