<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Outdoor__Employee_id');
            $table->foreign('Outdoor__Employee_id')->references('id')->on('outdoor__employees');

            $table->unsignedBigInteger('Patient_id');
            $table->foreign('Patient_id')->references('id')->on('patients');

            $table->string('Age');
            $table->string('Problem');
            $table->string('RoomAndDr');
            $table->string('Date')->useCurrent();

            $table->string('Payment')->default('Unpaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
