<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            // Early reg end will be a serialized array of dates for each reg period.
            $table->string('early_reg_end')->nullable();
            $table->boolean('completed')->default(false);
            $table->longText('details');
            $table->longText('crosstable')->nullable();
            $table->longText('pairings')->nullable();
            $table->longText('report')->nullable();
            // Early EF will be an serialized array to allow for multiple Early Bird
            $table->string('early_ef');
            $table->float('full_ef');
            $table->float('junior_discount');
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
        Schema::dropIfExists('tournament');
    }
}
