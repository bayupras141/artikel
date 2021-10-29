<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    use HasFactory;

    protected $table = 'table_konten';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'image',
        'status',
        'like',
    ];
}
