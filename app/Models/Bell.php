<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bell extends Model
{
    use HasFactory;

    protected $fillable = ['id_day', 'jam', 'jadwal', 'audio'];

    public function day()
    {
        return $this->belongsTo(Day::class, 'id_day');
    }
    
    public function audio()
    {
        return $this->belongsTo(Audio::class, 'id_audio');
    }
}
