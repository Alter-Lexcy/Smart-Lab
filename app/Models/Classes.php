<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{

    protected $guarded = ['id'];
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function Modul(){
        return $this->hasMany(Modul::class);
    }
    public function Task(){
        return $this->hasMany(Task::class);
    }
    public function Comment(){
        return $this->hasMany(Comment::class);
    }
}
