<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invitation_links', function (Blueprint $table) {
            $table->uuid();
            $table->string('email');
            $table->enum('role', ['aprendiz', 'colaborador', 'freelancer']);
            // $table->timestamp('used_at')->nullable();
            // $table->timestamp('expires_at');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('invitation_links');
    }
};
