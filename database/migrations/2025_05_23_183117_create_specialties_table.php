<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->unsignedBigInteger('specialty_id', true);
            $table->unsignedBigInteger('fk_personal_data_id')->nullable();
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('course')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('academic_institution')->nullable();
            $table->string('level')->nullable(); // basico - intermedio - avanzado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
