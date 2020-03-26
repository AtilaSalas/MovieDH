<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('genres')) {
        Schema::create('genres', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('name', 100)->collation('utf8_unicode_ci');
          $table->unsignedInteger('ranking')->default(0);
          $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('genres');
        Schema::enableForeignKeyConstraints();
    }
}
