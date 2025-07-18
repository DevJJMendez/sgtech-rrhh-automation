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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('emergency_contact_id', true);
            $table->unsignedBigInteger('fk_personal_data_id')->nullable();
            $table->foreign('fk_personal_data_id')->references('personal_data_id')->on('personal_data');
            $table->string('full_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('relationship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
