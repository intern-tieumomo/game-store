<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->date('release_date');
            $table->longtext('summary');
            $table->longText('features');
            $table->longText('requirement');
            $table->bigInteger('publisher_id');
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
        Schema::dropIfExists('pending_games');
    }
}
