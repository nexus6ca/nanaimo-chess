<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_list', function (Blueprint $table) {
            $table->integer('cfc_number')->unique()->primary();
            //$table->prinary('cfc_number');
            $table->date('expiry');
            $table->string('last_name');
            $table->string('first_name');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_list');
    }
}
