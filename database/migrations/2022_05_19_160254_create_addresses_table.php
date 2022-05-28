<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'addresses',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('account_id');
                $table->string('name', 255);
                $table->string('mobile', 255);
                $table->date('birthday')->nullable();
                $table->string('street_address', 255);
                $table->unsignedTinyInteger('type');
                $table->unsignedTinyInteger('select');

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
