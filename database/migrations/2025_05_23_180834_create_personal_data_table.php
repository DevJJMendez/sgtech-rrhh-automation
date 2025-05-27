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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id('id');
            $table->date('hiring_date');
            $table->string('job_position');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('gender');
            $table->string('marital_status');
            $table->date('birthdate');
            $table->string('place_of_birth');
            $table->string('blood_group');
            $table->string('dni');
            $table->string('date_of_issue');
            $table->string('place_of_issue');
            $table->string('nationality');
            $table->string('address');
            $table->string('phone_number');
            $table->string('cellphone_number');
            $table->string('email');
            $table->string('banking_entity');
            $table->string('account_number');
            $table->string('account_type');
            $table->string('eps');
            $table->string('pension_fund');
            $table->string('severance_pay_fund');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
