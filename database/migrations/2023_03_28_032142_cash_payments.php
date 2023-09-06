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
        Schema::create('cash_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id'); // foreign key
            $table->unsignedBigInteger('clinic_informations_id'); // foreign key
            $table->string('payment_date');
            $table->string('cash_payment_amount');
            $table->timestamps();
                       
            // Define foreign key constraint
            $table->foreign('users_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('clinic_informations_id')->references('id')->on('clinic_informations')->onDelete('restrict');

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
        Schema::dropIfExists('cash_payments');
        //
    }
};
