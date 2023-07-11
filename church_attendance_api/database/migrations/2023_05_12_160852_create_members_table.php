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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('cell_id');
            $table->unSignedBigInteger('service_unit_id');
            $table->string('passport');
            $table->string('birthday',8);
            $table->string('water_baptism',5);
            $table->string('believer_foundation',5);
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
        Schema::dropIfExists('members');
    }
};
