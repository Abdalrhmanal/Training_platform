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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->string('descrebtion');
            $table->unsignedBigInteger('teacher_id');
            $table->date('course_date');
            $table->decimal('price', 8, 2); // يمكن تعديل الدقة حسب الحاجة
            $table->timestamps();

            // إضافة العلاقة بجدول المعلمين
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
