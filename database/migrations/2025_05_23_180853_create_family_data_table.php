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
        Schema::create('family_data', function (Blueprint $table) {
            $table->unsignedBigInteger('family_data_id', true);
            $table->unsignedBigInteger('fk_personal_data_id');
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('relationship');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('age');
            $table->date('birthdate');
            $table->string('dni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_data');
    }
};
