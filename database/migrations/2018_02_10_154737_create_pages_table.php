<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->unique();
            $table->longText('entry');
            $table->string('category');
//            $table->integer('poster')->unsigned()->length(10);
//            $table->foreign('poster')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('edit_by')->unsigned()->length(10)->nullable();
//            $table->foreign('edit_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('pages');
    }
}
