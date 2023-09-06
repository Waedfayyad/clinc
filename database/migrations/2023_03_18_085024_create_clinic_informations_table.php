<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * User_ID
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_informations', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_phone')->nullable();
            $table->string('clinic_name');
            $table->string('clinic_specialty');
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

            // Define foreign key constraint
        });
    }

    /**doctor_id
     * Reverse the migrations.
     *        Schema::create('my_table', function (Blueprint $table) {
     * @return void
     */
    
    public function down()
    {
        Schema::dropIfExists('clinic_informations');
    }
};
