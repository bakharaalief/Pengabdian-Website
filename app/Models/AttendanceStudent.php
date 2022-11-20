<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudent extends Model
{
    use HasFactory;
    
    protected $table = 'attendance_students';
    
    protected $fillable = [
        'attendance_id',
        'student_id',
        'status'
    ];

    public function getStudent()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
