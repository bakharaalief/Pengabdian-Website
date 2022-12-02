<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bap extends Model
{
    use HasFactory;
    protected $table = 'baps';

    use HasFactory;

    protected $fillable = [
        'materi',
        'keterangan',
        'tanggal',
        'user',
        'class_id'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function classes() 
    {
        return $this->belongsTo(Kelas::class, 'classes', 'id');
    }
}
