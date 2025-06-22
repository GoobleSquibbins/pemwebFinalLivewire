<?php

namespace App\Models;

use App\Models\Film;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $primaryKey = 'jadwal_id';
    protected $fillable = [
        'film_id',
        'studio_id',
        'tanggal',
        'jam',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'film_id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'studio_id', 'studio_id');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'jadwal_id');
    }
}
