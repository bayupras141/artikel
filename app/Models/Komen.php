<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;

    protected $table = 'table_komen';

    protected $fillable = [
        'user_id',
        'konten_id',
        'komen',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
