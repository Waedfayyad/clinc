<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_id')->nullable(); // foreign key
            $table->string('user_full_name');
            $table->string('user_mobile')->nullable();
            $table->string('user_type');
            $table->string('user_birth_date')->nullable();
            $table->string('user_specialty')->nullable();
            $table->string('user_gender')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
 
            // Define foreign key constraint served
            $table->foreign('clinic_id')->references('id')->on('clinic_informations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
