<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopManagerTimeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ShopManagerTimeSets', function (Blueprint $table) {
            $table->integer('ShopManagerId')->default(0)->primary();
            $table->tinyInteger('Monday')->nullable()->default(1);
            $table->tinyInteger('Tuesday')->nullable()->default(1);
            $table->tinyInteger('Wednesday')->nullable()->default(1);
            $table->tinyInteger('Thursday')->nullable()->default(1);
            $table->tinyInteger('Friday')->nullable()->default(1);
            $table->tinyInteger('Saturday')->nullable()->default(1);
            $table->tinyInteger('Sunday')->nullable()->default(1);
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
        Schema::dropIfExists('ShopManagerTimeSets');
    }
}
