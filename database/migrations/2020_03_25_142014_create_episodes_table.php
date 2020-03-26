<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('episodes')) {
        Schema::create('episodes', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('title', 500)->collation('utf8_unicode_ci');
          $table->unsignedInteger('number')->nullable();
          $table->dateTime('release_date', 0);
          $table->unsignedDecimal('rating', 3, 1);
          $table->unsignedBigInteger('season_id')->nullable();
          $table->foreign('season_id')->references('id')->on('seasons');
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
        Schema::dropIfExists('episodes');
        Schema::enableForeignKeyConstraints();
    }
}
