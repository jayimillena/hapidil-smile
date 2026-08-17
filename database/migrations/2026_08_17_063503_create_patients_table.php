<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_number')->unique();
            $table->string('full_name');
            $table->string('status')->default('STABLE');
            $table->timestamp('last_session_at')->nullable();
            $table->string('procedure_name');
            $table->timestamp('next_checkup_at')->nullable();
            $table->unsignedInteger('encrypted_files_count')->default(0);
            $table->string('primary_doctor');
            $table->string('telemetry_status')->default('Sync Complete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};