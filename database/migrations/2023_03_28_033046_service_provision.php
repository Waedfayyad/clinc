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
        Schema::create('service_provision', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_informations_id'); // foreign key
            $table->unsignedBigInteger('patient_id'); // foreign key
            $table->string('service_date')->nullable();
            $table->string('service_time')->nullable();
            $table->string('service_duration')->nullable();
            $table->string('patient_symptoms')->nullable();
            $table->string('patient_diagnosis')->nullable();
            $table->string('patient_checkups')->nullable();
            $table->string('patient_prescription')->nullable();
            $table->string('service_cost')->nullable();
            $table->boolean('served')->nullable();
            $table->timestamps();
                       
            // Define foreign key constraint served
            $table->foreign('clinic_informations_id')->references('id')->on('clinic_informations')->onDelete('restrict');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('restrict');

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_provision');
        //
    }
};
