<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->unsignedInteger('round');
            $table->boolean('is_triplecrown')->default(false);
            $table->string('status')->default('upcoming');
            $table->time('start_time', 0);
            $table->string('division')->nullable();
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
        Schema::dropIfExists('race_events');
    }
}
