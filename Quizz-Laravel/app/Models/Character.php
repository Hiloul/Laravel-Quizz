<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nom',
        'description',
        'specialite',
        'magie',
        'force',
        'agilite',
        'intelligence',
        'pv'
        
    ];
}