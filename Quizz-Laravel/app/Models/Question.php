<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'question_text',
        'created_at',
        'updated_at' 
    ];
    

    //Question appartient à catégorie
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
