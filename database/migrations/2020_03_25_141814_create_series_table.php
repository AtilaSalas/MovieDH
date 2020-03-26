<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('series')) {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 500)->collation('utf8_unicode_ci');
            $table->dateTime('release_date', 0);
            $table->dateTime('end_date', 0);
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->foreign('genre_id')->references('id')->on('genres');
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

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('series');
        Schema::enableForeignKeyConstraints();
    }
}
