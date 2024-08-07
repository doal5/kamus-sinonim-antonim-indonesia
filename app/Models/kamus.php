<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamus extends Model
{
    protected $table = 'kamus';
    protected $primayKey = 'id';
    protected $guarded = [
        'id', 'kata', 'keterangan', 'type'
    ];
    use HasFactory;
}
