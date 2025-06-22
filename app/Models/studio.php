<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class studio extends Model
{
    use HasFactory;

    protected $table = 'studios';
    protected $primaryKey = 'studio_id';
    protected $fillable = [
        'nama_studio',
        'kapasitas',
    ];
}
