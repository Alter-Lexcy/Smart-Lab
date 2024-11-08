<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
        'user_id',
        'class_id',
        'content'
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
}
