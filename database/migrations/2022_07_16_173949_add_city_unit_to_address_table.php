<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class AddCityUnitToAddressTable
 */
class AddCityUnitToAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'addresses',
            function (Blueprint $table) {
                $table->string('city')->nullable()->after('street_address');;
                $table->string('unit')->nullable()->after('city');;
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
        Schema::table(
            'addresses',
            function (Blueprint $table) {
                Schema::dropIfExists('city');
                Schema::dropIfExists('unit');
            }
        );
    }
}
