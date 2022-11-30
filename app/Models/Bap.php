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
        'guru',
        'class_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users', 'id');
    }
}
