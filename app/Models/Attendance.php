<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    use HasFactory;

    protected $fillable = [
        'tanggal',
        'class_id'
    ];

    public function students() 
    {
        return $this->belongsToMany(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Kelas::class, 'classes','id');
    }
}
