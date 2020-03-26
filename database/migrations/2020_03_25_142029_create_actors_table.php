<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('actors')) {
        Schema::create('actors', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('first_name', 100)->collation('utf8_unicode_ci');
          $table->string('last_name', 100)->collation('utf8_unicode_ci');
          $table->unsignedDecimal('rating', 3, 1);
          $table->unsignedBigInteger('favorite_movie_id')->nullable();
          $table->foreign('favorite_movie_id')->references('id')->on('movies');
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
        Schema::dropIfExists('actors');
        Schema::enableForeignKeyConstraints();
    }
}
