<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    
    protected $fillable = ['title', 'description', 'course_id', 'notify'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
