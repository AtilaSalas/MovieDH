<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('seasons')) {
        Schema::create('seasons', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('title', 500)->collation('utf8_unicode_ci');
          $table->unsignedInteger('number')->nullable();
          $table->dateTime('release_date', 0);
          $table->dateTime('end_date', 0);
          $table->unsignedBigInteger('serie_id')->nullable();
          $table->foreign('serie_id')->references('id')->on('series');
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
        Schema::dropIfExists('seasons');
        Schema::enableForeignKeyConstraints();
    }
}
