<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'name',
        'created_at',
        'updated_at' 
    ];


    // protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categoryQuestions()
    {
        return $this->hasMany(Question::class);
    }
}
