<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = ['nama','file'];

    public function bells()
    {
        return $this->hasMany(Bell::class, 'id_audio');
    }
}
