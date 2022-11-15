<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    use HasFactory;

    protected $fillable = [
        'tanggal'
    ];

    public function students() 
    {
        return $this->belongsToMany(Student::class);
    }
}
