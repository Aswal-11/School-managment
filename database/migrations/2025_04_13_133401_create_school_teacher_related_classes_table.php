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
        Schema::create('school_teacher_related_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('school_class_id');
            $table->timestamps();

            /**
             * Foreign key constraint added
             */
            $table->foreign('teacher_id')
                  ->references('id')->on('teachers')
                  ->onDelete('cascade');

            $table->foreign('school_class_id')
                  ->references('id')->on('school_classes')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_teacher_related_classes');
    }
};
