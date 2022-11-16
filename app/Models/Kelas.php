<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'classes';

    use HasFactory;

    protected $fillable = [
        'name',
        'study_time',
        'tahun_ajaran',
    ];

    public function getStudyTime()
    {
        return $this->belongsTo(StudyTime::class, 'study_time', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'attendance', 'id');
    }
}
