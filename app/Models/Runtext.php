<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runtext extends Model
{
    use HasFactory;
    protected $table ='texts';
    protected $fillable = [
        'runtext'
    ];
}
