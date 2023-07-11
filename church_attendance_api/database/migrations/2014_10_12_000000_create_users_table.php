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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->string('username');
            $table->string('sex');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('marital_status');
            $table->string('age_range',12);
          
            $table->unsignedBigInteger('state_of_origin');
            $table->unsignedBigInteger('lga');
            $table->string('born_again',5);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ip');
            $table->string('hash')->unique();
           
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
