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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_profile_picture')->nullable();
            $table->string('name');
            $table->foreignId('student_teacher_id')
                  ->nullable()
                  ->constrained('teachers') // ✅ Implicit foreign key constraint
                  ->nullOnDelete(); // ✅ Ensures 'set null' behavior on delete
            $table->integer('age');
            $table->string('class');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
