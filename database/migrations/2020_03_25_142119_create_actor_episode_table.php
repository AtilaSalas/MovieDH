<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorEpisodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('actor_episode')) {
        Schema::create('actor_episode', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->unsignedBigInteger('actor_id');
          $table->unsignedBigInteger('episode_id');
          $table->foreign('actor_id')->references('id')->on('actors');
          $table->foreign('episode_id')->references('id')->on('episodes');
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
        Schema::dropIfExists('actor_episode');
        Schema::enableForeignKeyConstraints();
    }
}
