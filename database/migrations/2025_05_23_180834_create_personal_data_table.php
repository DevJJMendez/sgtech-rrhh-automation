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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('gender');
            $table->string('age');
            $table->string('marital_status');
            $table->string('birthdate');
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
            $table->string('bank_name');
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
