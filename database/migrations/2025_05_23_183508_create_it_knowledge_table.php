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
        Schema::create('it_knowledge', function (Blueprint $table) {
            $table->unsignedBigInteger('itknowledge_id', true);
            $table->unsignedBigInteger('fk_personal_data_id');
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('technology');
            $table->enum('level', ['basic', 'intermediate', 'advanced']); // basico - intermedio - avanzado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_knowledge');
    }
};

