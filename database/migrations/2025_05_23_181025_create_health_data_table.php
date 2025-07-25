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
        Schema::create('health_data', function (Blueprint $table) {
            $table->unsignedBigInteger('health_data_id', true);
            $table->unsignedBigInteger('fk_personal_data_id')->nullable();
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('allergies')->nullable();
            $table->string('diseases')->nullable();
            $table->string('medications')->nullable();
            $table->string('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_data');
    }
};
