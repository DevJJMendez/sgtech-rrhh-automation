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
            $table->unsignedBigInteger('academic_information_id', true);
            $table->unsignedBigInteger('fk_personal_data_id');
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('academic_institution');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('university_career');
            $table->string('degree');
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
