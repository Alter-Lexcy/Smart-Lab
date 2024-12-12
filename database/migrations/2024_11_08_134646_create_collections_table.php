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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks');
            $table->foreignId('user_id')->constrained('users'); // Siswa yang mengumpulkan tugas
            $table->string('file_collection')->nullable(); // File tugas yang dikumpulkan
            $table->enum('status', ['Belum mengumpulkan', 'Sudah mengumpulkan'])->default('Belum mengumpulkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
