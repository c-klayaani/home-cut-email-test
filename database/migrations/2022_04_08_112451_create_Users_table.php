<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('Users')) {
            Schema::create('Users', function (Blueprint $table) {
                $table->integer('Id', true);
                $table->string('Username', 50)->nullable();
                $table->string('Password', 500)->nullable();
                $table->string('UserType', 20)->nullable();
                $table->tinyInteger('Blocked')->nullable()->default(0);
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
        Schema::dropIfExists('Users');
    }
}
