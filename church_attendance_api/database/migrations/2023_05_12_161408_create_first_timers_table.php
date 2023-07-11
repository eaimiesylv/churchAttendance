<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_timers', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->boolean('on_transit');
            $table->string('transit_duration')->default('none');
            $table->boolean('should_we_visit');
            $table->boolean('become_a_member');
            $table->boolean('see_pastor');
            $table->text('prayer_request')->nullable();
            $table->unSignedBigInteger('cell_id')->nullable();
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
        Schema::dropIfExists('first_timers');
    }
};
