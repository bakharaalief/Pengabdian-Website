<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'students_classes';

    protected $fillable = [
        'student',
        'class',
    ];

    public function getStudent()
    {
        return $this->belongsTo(Student::class, 'student', 'id');
    }
}
