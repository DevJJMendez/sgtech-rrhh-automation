<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->unsignedBigInteger('personal_data_id', true);
            $table->unsignedBigInteger('fk_invitation_link_id')->nullable();
            $table->foreign('fk_invitation_link_id')->references('id')->on('invitation_links');
            $table->date('hiring_date');
            $table->string('role', 50);
            $table->string('job_position', 50);
            $table->string('first_name', 30);
            $table->string('middle_name', 30)->nullable();
            $table->string('last_name', 30);
            $table->string('second_last_name', 30)->nullable();
            $table->enum('gender', ['Masculino', 'Femenino']);
            $table->enum('marital_status', ['soltero', 'casado', 'divorciado', 'viudo']);
            $table->date('birthdate');
            $table->string('place_of_birth', 50);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('dni', 20);
            $table->date('date_of_issue');
            $table->string('place_of_issue', 50);
            $table->string('nationality', 50);
            $table->string('address');
            $table->string('phone_number', 20);
            $table->string('cellphone_number', 20);
            $table->string('email');
            $table->string('banking_entity', 30);
            $table->string('account_number', 30);
            $table->enum('account_type', ['corriente', 'ahorros', 'nomina']);
            $table->string('eps', 50);
            $table->string('pension_fund', 50);
            $table->string('severance_pay_fund', 50);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
