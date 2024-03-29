<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
     protected $fillable =[
         'answer1',
         'answer2',
         'answer3',
         'answer4',
         'answer5',
         'email',
         'user_id',
     ];

     //ORM
     public function users(){
         return $this->belongsTo(User::class,'user_id','id');
 
     }
     public function answers(){
         return $this->hasMany(Answer::class,'answer_id','id');
 
     }
 
}

