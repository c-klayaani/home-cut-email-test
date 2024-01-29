<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Services', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('CountryId')->nullable()->index('FK_Service_Country_CountryId');
            $table->string('Name', 100)->nullable();
            $table->string('Description', 200)->nullable();
            $table->string('ArName', 100)->nullable();
            $table->string('ArDescription', 200)->nullable();
            $table->decimal('Price', 18, 3)->nullable()->default(0);
            $table->integer('Duration')->nullable()->default(0);
            $table->integer('Order')->nullable()->default(0);
            $table->unsignedTinyInteger('IsChecked')->nullable()->default('0');
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
        Schema::dropIfExists('Services');
    }
}
