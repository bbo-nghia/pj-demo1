<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'account_pictures',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('account_id');
                $table->string('original_file_name');
                $table->string('main_file_name');
                $table->string('thumb_file_name');

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
        Schema::dropIfExists('account_pictures');
    }
}
