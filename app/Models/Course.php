<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'teacher_id', 'course_date', 'price'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany(CourseStudent::class, 'course_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'course_id');
    }
    public function Namestudents()
{
    return $this->hasManyThrough(Student::class, CourseStudent::class, 'course_id', 'student_id');
}

}
