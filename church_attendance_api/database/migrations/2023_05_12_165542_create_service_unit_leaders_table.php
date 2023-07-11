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
        Schema::create('service_unit_leaders', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('service_unit_id');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('service_unit_leaders');
    }
};
