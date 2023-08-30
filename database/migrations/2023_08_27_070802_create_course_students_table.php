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
        Schema::create('course_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // إضافة العلاقة بجدول الدورات
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
            // إضافة العلاقة بجدول المستخدمين (الطلاب)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Schema::create('course_students', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_students');
    }
};
