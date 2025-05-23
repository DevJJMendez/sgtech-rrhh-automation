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
        Schema::create('academic_information', function (Blueprint $table) {
            $table->id();
            $table->string('academic_institution');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('university_career');
            $table->string('degree');
            $table->string('professional_card');// si / no
            $table->string('card_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_information');
    }
};
