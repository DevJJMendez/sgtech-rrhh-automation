<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invitation_links', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->uuid('uuid')->unique();
            $table->string('email');
            $table->unsignedTinyInteger('fk_collaborator_role_id');
            $table->foreign('fk_collaborator_role_id')->references('collaborator_role_id')->on('collaborator_roles');
            $table->enum('status', ['pending', 'used', 'expired'])->default('pending');
            $table->timestamp('used_at')->nullable();
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('invitation_links');
    }
};
