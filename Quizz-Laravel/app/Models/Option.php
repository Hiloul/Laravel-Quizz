<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'option_text',
        'question_id',
    ];

    //Option appartient à Question (correspond aux réponses)
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
