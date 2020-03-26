<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('movies')) {
        Schema::create('movies', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('title', 500)->collation('utf8_unicode_ci');
          $table->unsignedDecimal('rating', 3, 1);
          $table->unsignedInteger('awards')->default(0);
          $table->dateTime('release_date', 0);
          $table->unsignedInteger('length');
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
        Schema::dropIfExists('movies');
        Schema::enableForeignKeyConstraints();
    }
}
