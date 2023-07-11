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
        Schema::create('user_leader_positions', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('user_leader_position_id');
            $table->unSignedBigInteger('created_by');
            $table->string('ip');
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
        Schema::dropIfExists('user_leader_positions');
    }
};
